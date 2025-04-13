<?php if (isset($lastNews)) : ?>
    <div class="last-news" style="background: url('/assets/images/<?= $lastNews->image ?>') no-repeat center / cover;">
        <div class="last-news__inner container">
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
                <span class="news-item__date"><?= date('d.m.Y', strtotime($n->date)); ?></span>
                <h3 class="news-item__title"><?= $n->title; ?></h3>
                <div class="news-item__text"><?= $n->announce; ?></div>
                <a class="news-item__link" href="/news/<?= $n->id ?>?return_url='<?=urlencode($_SERVER['REQUEST_URI'])?>'">
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

    <?php if (isset($pagination)) : ?>
        <div class="pagination">
            <?php if ($pagination->getPrevious()): ?>
                <a class="pagination__link pagination__link_arrow" href="/page/<?= $pagination->getPrevious() ?>">
                <svg class="pagination__link__svg svg-reverse" viewBox="0 0 16.763 13.322" ><path d="M13.34 5.66 9.39 1.71a.99.99 0 0 1 0-1.42.996.996 0 0 1 1.41 0l5.66 5.66c.4.39.4 1.02 0 1.41l-5.66 5.66c-.39.4-1.01.4-1.41 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.57 0-1-.44-1-1s.43-1 1-1h12.34Z"/></svg>
                </a>
            <?php endif; ?>

            <?php foreach ($pagination->getPages() as $pageNumber): ?>
                <?php if ($pageNumber == $pagination->getCurrent()): ?>
                    <span class="pagination__link active"><?= $pageNumber ?></span>
                <?php else: ?>
                    <a class="pagination__link" href="/page/<?= $pageNumber ?>"><?= $pageNumber ?></a>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($pagination->getNext()): ?>
                <a class="pagination__link pagination__link_arrow" href="/page/<?= $pagination->getNext() ?>">
                <svg class="pagination__link__svg" viewBox="0 0 16.763 13.322" ><path d="M13.34 5.66 9.39 1.71a.99.99 0 0 1 0-1.42.996.996 0 0 1 1.41 0l5.66 5.66c.4.39.4 1.02 0 1.41l-5.66 5.66c-.39.4-1.01.4-1.41 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.57 0-1-.44-1-1s.43-1 1-1h12.34Z"/></svg>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</section>