<?php
$theme = Ponzoblocks::blockTheme('tabs', $block['data']['theme']);
$content = Ponzoblocks::blockData($block,'tabs');
?>
<Tabs 
:theme='<?=json_encode($theme);?>'
:content='<?=$content;?>'
>
</Tabs>
