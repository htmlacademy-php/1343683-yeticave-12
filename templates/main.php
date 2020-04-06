<section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            
            <?php
            $index = 0;
            $num = count($categories);
            while ($index < $num): ?>
                <li class="promo__item promo__item--boards">
                    <a class="promo__link" href="pages/all-lots.html"><?php echo(htmlspecialchars($categories[$index])); ?></a>
                </li>
            <?php 
            $index++;
            endwhile;
            ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            
            <?php foreach ($announcement as $key => $val): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?php echo($val['pictures_url']); ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?php echo(htmlspecialchars($val['category'])); ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?php echo(htmlspecialchars($val['title'])); ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?php setPrice($val['price']); ?></span>
                        </div>
                        <?php [$hours, $mins] = getTimeExp($val['last_day']); ?>
                        <div class="lot__timer timer <?php if($hours < 10) echo 'timer--finishing'; ?>">
                        <?php printTimeExp($hours, $mins); ?>                                                                               
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>