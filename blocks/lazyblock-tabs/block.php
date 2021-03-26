<?php
$theme = Ponzo::blockTheme('tabs', $attributes['blocktheme']);
?>
<Tabs :theme='<?=json_encode($theme);?>'>
    <?php foreach( $attributes['tabs'] as $e ): ?>
    <Tab>
        <h4>Tab</h4>
        <p><?= $e['title']?></p>
        <p><?= $e['text']?></p>
    </Tab>
    <?php endforeach; ?>
</Tabs>
