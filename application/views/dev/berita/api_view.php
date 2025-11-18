<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terbaru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Berita Terbaru</h1>
    <div id="news-data">
        <?php if (isset($news['error'])): ?>
            <p><?= htmlspecialchars($news['error']) ?></p>
        <?php else: ?>
            <ul>
                <?php foreach ($news as $item): ?>
                    <li>
                        <h2><?= htmlspecialchars($item['title']) ?></h2>
                        <p><strong>Penulis:</strong> <?= htmlspecialchars($item['author']['full_name'] ?? 'Tidak Diketahui') ?></p>
                        <p><?= htmlspecialchars($item['content']) ?></p>
                        <img src="<?= htmlspecialchars($item['picture']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                        <p><a href="<?= htmlspecialchars($item['hyperlink']) ?>" target="_blank">Baca Selengkapnya</a></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>
