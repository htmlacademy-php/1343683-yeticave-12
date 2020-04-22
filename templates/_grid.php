<ul class="lots__list">
    <?php foreach ($announcement as $ann): ?>
        <li class="lots__item lot">
            <div class="lot__image">
                <a href="index.php?id=<?=$ann['id'];?>"><img src="<?=$ann['image']; ?>" width="350" height="260" alt="">
            </div>
            <div class="lot__info">
                <span class="lot__category"><?=htmlspecialchars($ann['cat_name']);?></span>
                <h3 class="lot__title"><a class="text-link"><?=htmlspecialchars($ann['title']);?></a></h3>
                <div class="lot__state">
                    <div class="lot__rate">
                        <span class="lot__amount">Стартовая цена</span>
                        <span class="lot__cost"><?php setPrice($ann['price_init']); ?></span>
                    </div>
                    <?php [$hours, $mins] = getTimeExp($ann['date_exp']); ?>
                    <div class="lot__timer timer <?php if($hours < 10) echo 'timer--finishing'; ?>">
                        <?php printTimeExp($hours, $mins); ?>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
