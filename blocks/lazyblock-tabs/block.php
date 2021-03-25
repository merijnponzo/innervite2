<?php
// tab themes
$themes = [
  "dark" => [
      "button" => "one",
      "themecolor"=>"two",
      "columnwidth" => 4,
      "img"=>[
          "orientation"=>"landscape",
          "crop"=>"square"
      ],
    ],
    "light" => [
        "button" => "one",
        "themecolor"=>"two",
        "columnwidth" => 4,
        "img"=>[
            "orientation"=>"landscape",
            "crop"=>"square"
        ]
    ]
];
// add theme
$theme = null;
if(isset($themes[$attributes['blocktheme']])){
    $theme = $themes[$attributes['blocktheme']];
}
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
