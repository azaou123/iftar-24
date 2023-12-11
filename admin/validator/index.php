<?php

include 'simple_html_dom.php';
class Validator
{
    private $url;
    private $formData;

    public function __construct($url, $formData)
    {
        $this->url = $url;
        $this->formData = $formData;
    }

    public function fetchData()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->formData);
        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }
        curl_close($ch);
        return $output;
    }
    public function extractH3Elements($html)
    {
        $data = [];
        // Parse the HTML content using Simple HTML DOM Parser
        $htmlObject = str_get_html($html);
        foreach ($htmlObject->find('h3') as $h3Element) {
            $data[] = $h3Element->plaintext . PHP_EOL;
        }
        // Release the memory used by the Simple HTML DOM Parser
        $htmlObject->clear();
        unset($htmlObject);
        return $data;
    }
}

// URL for Scraping
$url = 'https://e-bourse-maroc.onousc.ma/page2.php';  // Adjust the action attribute of the form

// Define the form data you want to submit
$formData = [
    'cne' => 'g135155294',  // Replace 'your_cne_value' with the actual CNE value
    'abac' => '2020',  // Replace 'your_abac_value' with the actual ABAC value
    'type' => '2',  // Replace 'your_type_value' with the actual Type value
];

// Create an instance of the Validator class
$validator = new Validator($url, $formData);
// Fetch data using cURL
$output = $validator->fetchData();
// Extract h3 elements
$data = $validator->extractH3Elements($output);

// Display the extracted data
print_r($data);
?>
