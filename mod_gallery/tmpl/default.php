<?php
jimport( 'joomla.environment.request' );

// no direct access
defined('_JEXEC') or die;

?>

<div class="gallery_info">
    <div class="container">
        <div class="col-md-12">
            <div class="content-text">
                <div class="row">
                    <div class="our_gallery">
                        <div class="icon_our_gallery">
                        </div>
                        <p><?php echo JText::_('MOD_GALLERY_GALLERY'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gallery_wrap">
    <!--Фото одного размера-->
	<?php $numbr = 1; ?>
    <?php foreach ($folder as $dir) :?>

        <!--	    Переменная с датой с базы-->
        <?php $day = $data[$key]; ?>

        <!--	    Перевод даты с базы  в формат времени Unix-->
        <?php $time = strtotime($day); ?>

        <!--	    Создаем асоциативный массив где каждому числу месяца присваиваем название месяца-->
        <?php $month_name = array( 1 => JText::_('MOD_GALLERY_JANUARY'), 2 => JText::_('MOD_GALLERY_FEBRUARY'), 3 =>
            JText::_('MOD_GALLERY_MARCH'), 4 => JText::_('MOD_GALLERY_APRIL'), 5 => JText::_('MOD_GALLERY_MAY'), 6 =>
            JText::_('MOD_GALLERY_JUNE'), 7 => JText::_('MOD_GALLERY_JULY'), 8 => JText::_('MOD_GALLERY_AUGUST'), 9
        => JText::_('MOD_GALLERY_SEPTEMBER'), 10 => JText::_('MOD_GALLERY_OCTOBER'), 11 => JText::_('MOD_GALLERY_NOVEMBER'), 12 => JText::_('MOD_GALLERY_DECEMBER')); ?>

        <!--	    Получаем название месяца, здесь исспользуется наш созданный массив-->
        <?php $month = $month_name[ date( 'n',$time ) ]; ?>
        <!--        С помощью функции date() получаем число дня-->
        <?php $day   = date( 'j',$time ); ?>
        <!--        Получаем год-->
        <?php $year  = date( 'Y',$time ); ?>
        <!--        Получаем значение часов-->
        <?php $hour  = date( 'G',$time ); ?>
        <!--        Получаем минуты-->
        <?php $min   = date( 'i',$time ); ?>
        <!--        Собираем пазл из переменных-->
        <?php $date = "$day $month $year, $hour:$min";  ?>

        <div class="container">
            <div class="row">
                <div class="gallery_div">
                    <div class="container">
                        <div class="gallery_title" id="galery">
                            <?php if ($menutype == 'mainmenu-uk-ua') :  ?>
                                <h3><?php echo $titleua[$key]; ?></h3>
                            <?php elseif ($menutype == 'mainmenu-ru-ru') : ?>
                                <h3><?php echo $titleru[$key]; ?></h3>
                            <?php else : ?>
                                <h3><?php echo $titleen[$key]; ?></h3>
                            <?php endif; ?>
                            <p class="date"><?php echo $hour.':'.$min;?><br><?php echo $day.' '.$month.' '.$year;?></p>
                        </div>
						<?php if ($dir != "-1") : ?>
                        <div class="clearfix mosaicflow">
                            <?php $files = scandir('images/gallery/'.$dir); ?>
                            <!--                    Перебираем все файлы-->
                            <?php foreach ($files as $file) : ?>
                                <!--                        Поточный каталог и родительский пропускаем-->
                                <?php if (($file != ".") && ($file != "..")) : ?>
                                    <div class="mosaicflow__item">
                                        <a class="fancyimage<?php echo $numbr; ?>" data-fancybox-group="group" href="images/gallery/<?php echo $dir. "/" .$file ?>">
                                            <img src="images/gallery/<?php echo $dir. "/" .$file; ?>" />
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $key++; ?>
	<?php $numbr++;?>
    <?php endforeach; ?>
</div>