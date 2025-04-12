<?php if (isset($lastNews)) : ?>
    <div class="last-news" style="background: url('./assets/images/<?= $lastNews->image?>') no-repeat center / cover;">
        <div class="last-news__inner container" >
            <h2 class="last-news__title"><?= $lastNews->title ?></h2>
            <div class="last-news__text"><?= $lastNews->announce ?></div>
                   </div>
    </div>
<?php endif; ?>

<section class="news-section container">
    <h2 class="news-section__title">Новости</h2>
    <div class="news-list">
        <?php foreach ($news as $n): ?>
            <article class="news-item">
                <div class="news-item__date"><?= date('d.m.Y', strtotime($n->date)); ?></div>
                <h3 class="news-item__title"><?= $n->title; ?></h3>
                <div class="news-item__text"><?= $n->announce; ?></div>
                <a class="news-item__link" href="news/<?= $n->id ?>">
                    <span class="news-item__link__text">
                        подробнее
                    </span>
                    <svg class="news-item__link__svg" viewBox="0 0 27.004 13.322">
                        <path d="M1.02 7.64 1 7.66c-.56 0-1-.44-1-1s.44-1 1-1l.02.02v1.96Zm23.56-.98-4.95-4.95a.99.99 0 0 1 0-1.42c.4-.39 1.02-.39 1.42 0l5.65 5.66c.4.39.4 1.02 0 1.41l-5.65 5.66c-.4.4-1.02.4-1.42 0-.4-.4-.4-1.02 0-1.41l4.95-4.95Z" />
                        <path d="m23.58 5.66-3.95-3.95a.99.99 0 0 1 0-1.42c.4-.39 1.02-.39 1.42 0l5.65 5.66c.4.39.4 1.02 0 1.41l-5.65 5.66c-.4.4-1.02.4-1.42 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.56 0-1-.44-1-1s.44-1 1-1h22.58Z" />
                    </svg>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
    </div>
    <div class="pagination"></div>
</section>