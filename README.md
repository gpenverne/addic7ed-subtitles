# addic7ed-subtitles
A symfony3 bundle for alc/addic7ed-cli (addic7ed subtitles downloader)
This client allow to fetch subtitles from addic7ed.com

## Config
Load the bundle from your AppKernel.php file:
```
$bundles = [
    new Gpenverne\Addic7edSubtitlesBundle\Addic7edSubtitlesBundle(),
    ...,
];
```

## Use it
```
    $this->container->get('addic7edsubtitles_api')->getSubtitles($tvShowName, $season, $episod, $language);
    $this->container->get('addic7edsubtitles_api')->getSubtitles('My great tv show', 1, 3, 'English');
```
