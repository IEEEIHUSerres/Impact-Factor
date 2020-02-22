<?php

class ArticleCountToReport
{
    private $year;
    private $count;

    /**
     * ArticleCountToReport constructor.
     * @param $json
     */
    public function __construct($json)
    {
        $this->year = $json->year;
        $this->count = $json->articleCount;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
}

class PublicationToReport
{
    private $title;
    private $number;
    private $articleCounts;

    /**
     * PublicationToReport constructor.
     * @param $json
     */
    public function __construct($json)
    {
        $this->title = $json->publicationTitle;
        $this->number = $json->publicationNumber;
        $this->articleCounts = array();

        foreach ($json->articleCounts as $articleCount) {
            array_push($this->articleCounts, new ArticleCountToReport($articleCount));
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getArticleCounts()
    {
        return $this->articleCounts;
    }

    /**
     * @param mixed $articleCounts
     */
    public function setArticleCounts($articleCounts)
    {
        $this->articleCounts = $articleCounts;
    }

}

class PaperCitation
{
    private $order;
    private $articleNumber;
    private $publicationNumber;
    private $year;
    private $title;

    /**
     * PaperCitation constructor.
     * @param $json
     */
    public function __construct($json)
    {
        $this->order = $json->order;
        $this->articleNumber = $json->articleNumber;
        $this->publicationNumber = $json->publicationNumber;
        $this->year = $json->year;
        $this->title = $json->title;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getArticleNumber()
    {
        return $this->articleNumber;
    }

    /**
     * @param mixed $articleNumber
     */
    public function setArticleNumber($articleNumber)
    {
        $this->articleNumber = $articleNumber;
    }

    /**
     * @return mixed
     */
    public function getPublicationNumber()
    {
        return $this->publicationNumber;
    }

    /**
     * @param mixed $publicationNumber
     */
    public function setPublicationNumber($publicationNumber)
    {
        $this->publicationNumber = $publicationNumber;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}

class IeeePaperCitations
{
    private $ieee;

    /**
     * IeeePaperCitations constructor.
     * @param $json
     */
    public function __construct($json)
    {
        $this->ieee = array();

        foreach ($json->ieee as $paperCitation) {
            array_push($this->ieee, new PaperCitation($paperCitation));
        }
    }

    /**
     * @return array
     */
    public function getIeee(): array
    {
        return $this->ieee;
    }

    /**
     * @param array $ieee
     */
    public function setIeee(array $ieee)
    {
        $this->ieee = $ieee;
    }
}

class Publication
{
    private $publisher;
    private $title;
    private $contentType;
    private $ieeeCitationCount;
    private $publicationNumber;
    private $paperCitations;

    /**
     * Publication constructor.
     * @param $json
     */
    public function __construct($json)
    {
        $this->publisher = $json->publisher;
        $this->title = $json->title;
        $this->contentType = $json->contentType;
        $this->ieeeCitationCount = $json->ieeeCitationCount;
        $this->publicationNumber = $json->publicationNumber;
        $this->paperCitations = new IeeePaperCitations($json->paperCitations);
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param mixed $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return mixed
     */
    public function getIeeeCitationCount()
    {
        return $this->ieeeCitationCount;
    }

    /**
     * @param mixed $ieeeCitationCount
     */
    public function setIeeeCitationCount($ieeeCitationCount)
    {
        $this->ieeeCitationCount = $ieeeCitationCount;
    }

    /**
     * @return mixed
     */
    public function getPublicationNumber()
    {
        return $this->publicationNumber;
    }

    /**
     * @param mixed $publicationNumber
     */
    public function setPublicationNumber($publicationNumber)
    {
        $this->publicationNumber = $publicationNumber;
    }

    /**
     * @return IeeePaperCitations
     */
    public function getPaperCitations(): IeeePaperCitations
    {
        return $this->paperCitations;
    }

    /**
     * @param IeeePaperCitations $paperCitations
     */
    public function setPaperCitations(IeeePaperCitations $paperCitations)
    {
        $this->paperCitations = $paperCitations;
    }
}

function loadPublicationsToReport($publications)
{
    $publicationsJson = json_decode($publications);

    $publications = array();
    foreach ($publicationsJson->publications as $publicationJson) {
        array_push($publications, new PublicationToReport($publicationJson));
    }

    return $publications;
}

function loadPublicationsToReportDefault()
{
    $publicationsJson = json_decode(file_get_contents("./Publications.json"));

    $publications = array();
    foreach ($publicationsJson->publications as $publicationJson) {
        array_push($publications, new PublicationToReport($publicationJson));
    }

    return $publications;
}

function loadPublication($jsonRaw)
{
    $publicationTitle1Json = json_decode($jsonRaw);
    return new Publication($publicationTitle1Json);
}

function loadPublications($handle, $numberOfRecords)
{
    $publicationsRaw = array();
    for ($i = 0; $i < $numberOfRecords; $i++) {
        array_push($publicationsRaw, fgets($handle));
    }

    $publications = array();

    foreach ($publicationsRaw as $publicationJson) {
        array_push($publications, loadPublication($publicationJson));
    }

    return $publications;
}

function loadPublicationsDefault()
{
    $publicationsRaw = [
        file_get_contents("./PublicationTitle1.json"),
        file_get_contents("./PublicationTitle2.json"),
        file_get_contents("./PublicationTitle3.json"),
        file_get_contents("./PublicationTitle4.json"),
        file_get_contents("./PublicationTitle5.json"),
    ];

    $publications = array();

    foreach ($publicationsRaw as $publicationJson) {
        array_push($publications, loadPublication($publicationJson));
    }

    return $publications;
}

function calculateImpactFactorY($citationsYMinusOne,
                                $citationsYMinusTwo,
                                $publicationsYMinusOne,
                                $publicationsYMinusTwo)
{
    $citationsLastTwoYears = $citationsYMinusOne + $citationsYMinusTwo;
    $publicationsLastTwoYears = $publicationsYMinusOne + $publicationsYMinusTwo;

    return ($citationsLastTwoYears / $publicationsLastTwoYears);
}

function mergeAllCitations($publications)
{
    $citations = array();

    foreach ($publications as $publication) {
        foreach ($publication->getPaperCitations()->getIeee() as $paperCitation) {
            array_push($citations, $paperCitation);
        }
    }

    return $citations;
}

function getCitationsByIdAndYear($citationsToFilter, $id, $year)
{
    $citations = array();

    foreach ($citationsToFilter as $citationToFilter) {
        $currentPublicationNumber = $citationToFilter->getPublicationNumber();
        $currentPublicationYear = $citationToFilter->getYear();

        if ($id != $currentPublicationNumber) {
            continue;
        }

        if ($year != $currentPublicationYear) {
            continue;
        }

        array_push($citations, $citationToFilter);
    }

    return $citations;
}

/**
 * @param $publication
 * @param $year
 * @return int
 */
function getArticleCountByYear($publication, $year)
{
    $count = 0;

    foreach ($publication->getArticleCounts() as $articleCount) {
        if ($articleCount->getYear() == $year) {
            $count += $articleCount->getCount();
        }
    }

    return $count;
}

// MAIN
$handle = fopen("php://stdin", "r");
$numberOfFiles = fgets($handle);

//$publicationsToReport = loadPublicationsToReportDefault();
//$publications = loadPublicationsDefault();

$publicationsToReport = loadPublicationsToReport(fgets($handle));
$publications = loadPublications($handle, $numberOfFiles - 1);

fclose($handle);

$allCitations = mergeAllCitations($publications);

$results = array();

foreach ($publicationsToReport as $publication) {
    $number = $publication->getNumber();

    $countOf2017 = sizeof(getCitationsByIdAndYear($allCitations, $number, 2017));
    $countOf2018 = sizeof(getCitationsByIdAndYear($allCitations, $number, 2018));

    $articleCountOf2017 = getArticleCountByYear($publication, 2017);
    $articleCountOf2018 = getArticleCountByYear($publication, 2018);

    $rank = calculateImpactFactorY(
        $countOf2018, $countOf2017,
        $articleCountOf2018, $articleCountOf2017
    );

    $rank = number_format((double)$rank, 2, '.', '');

    array_push($results, [
        'name' => $publication->getTitle(),
        'rank' => $rank
    ]);
}

usort($results, function ($item1, $item2) {
    return $item2['rank'] <=> $item1['rank'];
});

foreach ($results as $result) {
    print $result['name'] . ': ' . $result['rank'] . PHP_EOL;
}
