<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">

        <?php foreach ($categories as $cat): ?>
            <li class="promo__item promo__item--<?=$cat['char_code'];?>">
                <a class="promo__link" href="index.php?cat_id=<?= $cat['id']; ?>"><?=htmlspecialchars($cat['cat_name']); ?></a>
            </li>
        <?php endforeach; ?>

    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>

    <?=include_template('_grid.php', ['announcement' => $announcement]); ?>

</section>
