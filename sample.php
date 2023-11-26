
<?php
include './vendor/autoload.php';
Use Sentiment\Analyzer;
$analyzer = new Analyzer(); 

use Stichoza\GoogleTranslate\GoogleTranslate;
$tr = new GoogleTranslate('en'); // Translates into English

if(isset($_POST['submit']))
{
    $word = $_POST['abstract'];
    $output_text = $analyzer->getSentiment($word);
    echo "<br/>";
echo $nword = $tr->setSource('fil')->setTarget('en')->translate($word);
echo "<br/>";

    if ($output_text['pos']*100 > $output_text['neg']*100) {
        echo 'positive';
    } elseif ($output_text['neg']*100 > $output_text['pos']*100) {
        echo 'negative';
    } else{
        echo 'neutral';
    }
}
?>
<form action="" method="post">
<input type="text" name="abstract" placeholder="enter text here">
<input type="submit" name="submit" value="analyze">
</form>