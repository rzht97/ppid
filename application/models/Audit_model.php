<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Audit Model
 *
 * Model untuk mencatat semua aktivitas admin ke audit log
 * Digunakan untuk security audit trail dan tracking perubahan data
 *
 * @author Claude (Anthropic AI)
 * @created 2025-11-22
 */
class Audit_model extends CI_Model
{
    private $_table = "audit_logs";

    /**
     * Log aktivitas admin ke database
     *
     * @param string $action Jenis aksi (create, update, delete, verify, process)
     * @param string $table_name Nama tabel yang terpengaruh
     * @param mixed $record_id ID record yang terpengaruh
     * @param mixed $old_values Data lama (akan di-convert ke JSON)
     * @param mixed $new_values Data baru (akan di-convert ke JSON)
     * @param string $description Deskripsi singkat aktivitas
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function log($action, $table_name, $record_id = null, $old_values = null, $new_values = null, $description = null)
    {
        // Ambil data user dari session
        $user_id = $this->session->userdata('id');
        $username = $this->session->userdata('username');

        // Jika tidak ada session (shouldn't happen in admin area), skip logging
        if (!$username) {
            return false;
        }

        // Prepare data untuk insert
        $data = array(
            'user_id' => $user_id,
            'username' => $username,
            'action' => $action,
            'table_name' => $table_name,
            'record_id' => $record_id,
            'old_values' => $old_values ? json_encode($old_values, JSON_UNESCAPED_UNICODE) : null,
            'new_values' => $new_values ? json_encode($new_values, JSON_UNESCAPED_UNICODE) : null,
            'description' => $description,
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent(),
            'created_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert($this->_table, $data);
    }

    /**
     * Shortcut: Log CREATE action
     */
    public function log_create($table_name, $record_id, $new_values, $description = null)
    {
        return $this->log('create', $table_name, $record_id, null, $new_values, $description);
    }

    /**
     * Shortcut: Log UPDATE action
     */
    public function log_update($table_name, $record_id, $old_values, $new_values, $description = null)
    {
        return $this->log('update', $table_name, $record_id, $old_values, $new_values, $description);
    }

    /**
     * Shortcut: Log DELETE action
     */
    public function log_delete($table_name, $record_id, $old_values, $description = null)
    {
        return $this->log('delete', $table_name, $record_id, $old_values, null, $description);
    }

    /**
     * Shortcut: Log VERIFY action
     */
    public function log_verify($table_name, $record_id, $description = null)
    {
        return $this->log('verify', $table_name, $record_id, null, null, $description);
    }

    /**
     * Shortcut: Log PROCESS action
     */
    public function log_process($table_name, $record_id, $new_values, $description = null)
    {
        return $this->log('process', $table_name, $record_id, null, $new_values, $description);
    }

    /**
     * Get audit logs dengan filter dan pagination
     *
     * @param array $filters Filter: action, table_name, user_id, date_from, date_to
     * @param int $limit Limit records
     * @param int $offset Offset for pagination
     * @return array Array of log records
     */
    public function get_logs($filters = array(), $limit = 100, $offset = 0)
    {
        // Apply filters
        if (isset($filters['action'])) {
            $this->db->where('action', $filters['action']);
        }
        if (isset($filters['table_name'])) {
            $this->db->where('table_name', $filters['table_name']);
        }
        if (isset($filters['user_id'])) {
            $this->db->where('user_id', $filters['user_id']);
        }
        if (isset($filters['username'])) {
            $this->db->like('username', $filters['username']);
        }
        if (isset($filters['record_id'])) {
            $this->db->where('record_id', $filters['record_id']);
        }
        if (isset($filters['date_from'])) {
            $this->db->where('created_at >=', $filters['date_from']);
        }
        if (isset($filters['date_to'])) {
            $this->db->where('created_at <=', $filters['date_to']);
        }

        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get($this->_table)->result();
    }

    /**
     * Count total logs dengan filter
     */
    public function count_logs($filters = array())
    {
        // Apply same filters
        if (isset($filters['action'])) {
            $this->db->where('action', $filters['action']);
        }
        if (isset($filters['table_name'])) {
            $this->db->where('table_name', $filters['table_name']);
        }
        if (isset($filters['user_id'])) {
            $this->db->where('user_id', $filters['user_id']);
        }
        if (isset($filters['username'])) {
            $this->db->like('username', $filters['username']);
        }
        if (isset($filters['record_id'])) {
            $this->db->where('record_id', $filters['record_id']);
        }
        if (isset($filters['date_from'])) {
            $this->db->where('created_at >=', $filters['date_from']);
        }
        if (isset($filters['date_to'])) {
            $this->db->where('created_at <=', $filters['date_to']);
        }

        return $this->db->count_all_results($this->_table);
    }

    /**
     * Get log by ID
     */
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, array('id' => $id))->row();
    }

    /**
     * Delete old logs (cleanup)
     * Hapus log lebih dari X hari (default 90 hari)
     */
    public function cleanup_old_logs($days = 90)
    {
        $cutoff_date = date('Y-m-d H:i:s', strtotime("-{$days} days"));
        $this->db->where('created_at <', $cutoff_date);
        return $this->db->delete($this->_table);
    }
}
