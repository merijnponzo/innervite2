<?php
$theme = Ponzo::blockTheme('tabs', $attributes['blocktheme']);
$content = Ponzo::blockSafeHtml($attributes['tabs'],'text');
?>
<Tabs 
:theme='<?=json_encode($theme);?>'
:content='<?=json_encode($content);?>'
>

</Tabs>
   