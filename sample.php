<?php
include './vendor/autoload.php';
use Sentiment\Analyzer;
use Stichoza\GoogleTranslate\GoogleTranslate;

$analyzer = new Analyzer();
$tr = new GoogleTranslate('en'); // Translates into English

if(isset($_POST['submit']))
{
    $word = $_POST['abstract'];
    $output_text = $analyzer->getSentiment($word);
    
    echo "<br/>";
    
    // Translate from Filipino to English
    $translated_word = $tr->setSource('fil')->setTarget('en')->translate($word);
    
    echo "<br/>";
    
    if ($output_text['pos']*100 > $output_text['neg']*100) {
        echo 'Sentiment: positive';
    } elseif ($output_text['neg']*100 > $output_text['pos']*100) {
        echo 'Sentiment: negative';
    } else{
        echo 'Sentiment: neutral';
    }

    echo "<br/>Translated Text: " . $translated_word;
}

?>

<form action="" method="post">
    <input type="text" name="abstract" placeholder="enter text here">
    <input type="submit" name="submit" value="analyze">
</form>
