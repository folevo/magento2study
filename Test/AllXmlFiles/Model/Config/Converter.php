<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 6.12.18
 * Time: 9.11
 */

namespace Test\AllXmlFiles\Model\Config;

use Magento\Framework\Config\ConverterInterface;
use Magento\Framework\Module\Dir\Reader;

class Converter implements ConverterInterface
{
    private $reader;
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function convert($source)
    {
//        $elementTeestList = $source->documentElement->childNodes;
//        $type = $source->doctype;
//        $docElement = $source->documentElement;
//        $document = $source->documentElement;
//        $type = $source->doctype;
//       // $this->debug($source);
//        $docrecover = $source->recover= true;
//        $docUri = $source->documentURI;
//        $docEncoding = $source->encoding;
//        $docformatOutput = $source->formatOutput = true;
//        $docimplementation = $source->implementation;
//        $docpreserveWhiteSpace = $source->preserveWhiteSpace;
//        $docresolveExternals = $source->resolveExternals;
//        $docStrictErrorChecking = $source->strictErrorChecking;
//        $docsubstituteEntities = $source->substituteEntities;
//        $docxmlEncoding = $source->xmlEncoding;
//        $docxmlStandalone = $source->xmlStandalone;
//        $docxmlVersion = $source->xmlVersion;
////        $elementTeestListInfo = [];
////        $iterator = 0;
////        foreach ($source->getElementsByTagName('test_element_list') as $item) {
////            foreach ($item->childNodes as  $childNodes){
////                $elementTeestListInfo[$iterator] = $childNodes;
////                $iterator++;
////            }
////        }
////        return ['test_element' => $elementTeestListInfo];
//
//        $documen = new \DOMDocument('1.0', "UTF-8");
//        $t = $documen->xmlEncoding;
//        $t = $documen->xmlVersion;
//        $docElement = $documen->createElement('test_element', 'Element Test');
//        $elemAttr = $documen->createAttribute('test_attr');
//        $elemAttr->value = 'test_value';
//        $docElement->appendChild($elemAttr);
//        $documen->appendChild($docElement);
//        $t = $elemAttr->isId();
//        $strXml = $documen->saveXML();
//        echo $strXml;
//        die;

        $source1 = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<root xml:id="ppppp"><ppp:u xmlns="http://somebooksite.com/book_spec" xmlns:ppp="http://www.example.com/XFoo1"><a>cccc</a><ppp:test_child ppp:ttt ='mmm'>ccccc<a name="mmmm"></a></ppp:test_child><ppp:a>xxx</ppp:a></ppp:u><tag name='test'><a >1111</a></tag><books>
 <book>Шаблоны корпоративных приложений</book>
 <book>Приёмы объектно-ориентированного проектирования. Паттерны проектирования</book>
 <book>Чистый код</book>
</books></root>
XML;
        $doc = $this->createDocument();
        $doc->loadXML($source1);
        $elemetById = $doc->getElementById('ppppp');
        echo $elemetById->tagName;
        $list = $doc->getElementsByTagName('book');
        $attrNs = $doc->createAttributeNS('namespaceUri','example:attr');
        $attrNs->value='aaaa';
        $doc->getElementsByTagName('tag')->item(0)->appendChild($attrNs);
        $tag = $doc->getElementsByTagName('tag');
        $cm = $doc->createTextNode("\n//");
        $text= 'hui sanek';
        $ct = $doc->createCDATASection("\n" . $text . "\n//");
        $tag->item(0)->appendChild($cm);
        $tag->item(0)->appendChild($ct);
        $CommentString = 'This contains -- some weird -- characters.';
        $comm = $doc->createComment($CommentString);
        $tag->item(0)->appendChild($comm);
        $fragment = $doc->createDocumentFragment();
        echo $tag->item(0)->tagName;
        $element = new \DOMElement('create_test','Created Succefull');
        $doc->appendChild($element);
        $fragment->appendXML('<pp>1111</pp>');
        $tag->item(0)->appendChild($fragment);
        $nsElem = $doc->createElementNS('http://www.example.com/XFoo', 'xpp:u','test ns element');
        $er = $doc->createEntityReference('copy');
        $doc->appendChild($nsElem);
        $nsElem->appendChild($er);
        $piNode = $doc->createProcessingInstruction('hui-pidar-node', 'type="text/xsl" href="base.xsl"');
        $doc->appendChild($piNode);
        $child = $doc->createElement('test_child','ccccc');
        $nsElem->appendChild($child);
        $root = $doc->getElementsByTagName('root')->item(0);
        //$attr = $root->getAttribute('xml:id');
        $attr = $root->getAttributeNode('xml:id');
        $lisNs = $doc->getElementsByTagNameNS('http://www.example.com/XFoo1', 'a');
        $t = $attr->isId();
        $uElement = $doc->getElementsByTagName('test_child');
        $count = count($uElement);
        $uElement = $uElement->item(0);
        $attr = $uElement->attributes;
        $attNs = $uElement->getAttributeNS('http://www.example.com/XFoo1', 'ttt');
        $attNs = $uElement->getAttributeNodeNS('http://www.example.com/XFoo1', 'ttt');
        $aElem = $tag->item(0)->getElementsByTagName('a');
        $nsElem = $root->getElementsByTagNameNS('http://www.example.com/XFoo1', 'a');
        $hashAttr = $tag->item(0)->hasAttribute('name');
        $hashAttr = $tag->item(0)->hasAttribute('p_name');
        $hashAttr = $uElement->hasAttributeNS('http://www.example.com/XFoo1', 'ttt');
        $value = $root->nodeValue;
        $value = $root->nodeType;
        $value = $root->parentNode;
        $value = $root->parentNode;
        $value = $root->firstChild;
        $value = $value->parentNode;
        $value = $root->lastChild;
        $value = $root->previousSibling;
        $value = $root->nextSibling;
        $value = $root->attributes;
        $value = $root->ownerDocument;
        $value = $uElement->namespaceURI;
        $value = $root->prefix;
        $value = $uElement->prefix;
        $value = $uElement->localName;
        $value = $root->textContent;
        $value = $root->baseURI;
        $line = $root->getLineNo();
        $path = $aElem->item(0)->getNodePath();
        $docElement = $doc->createElement('test_element', 'Element Test');
        $root->insertBefore($docElement,$doc->getElementsByTagName('books')->item(0));
        $t = $uElement->isDefaultNamespace('http://somebooksite.com/book_spec');
        $t = $uElement->lookupNamespaceUri('ppp');
        $t = $uElement->lookupPrefix('http://www.example.com/XFoo1');
       // $t = $uElement->removeChild($uElement->getElementsByTagName('a')->item(0));
        $t = $uElement->replaceChild($docElement,$uElement->getElementsByTagName('a')->item(0));
        $attr = $uElement->attributes;
       // $attr3 = $uElement->attributes->getNamedItemNS('http://www.example.com/XFoo1','ttt');
        $attr3 = $uElement->attributes->item(0);
        $testText = $doc->createElement('test_text');
        $doc->appendChild($testText);
        $TEXT = new \DOMText(' Test Text ');
        $doc->appendChild($TEXT);
        $space = $TEXT->isWhitespaceInElementContent();
       // $TEXT->splitText(5);
        $TEXT->appendData('Append data');
        $TEXT->insertData(6,'Insert data ');
        $TEXT->replaceData(6,12,'Insert data1 ');

       // echo $str = $TEXT->substringData(6, 12);
        //$TEXT->deleteData(6, 12);


        $source1 = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE book PUBLIC "-//OASIS//DTD DocBook XML V4.1.2//EN"
 "http://www.oasis-open.org/docbook/xml/4.1.2/docbookx.dtd" [
]>
<book id="listing">
 <title>PHP Basics</title>
 <chapter id="books">
  <title id="hh">My books</title>
  <para id ='pp1'>
   <informaltable>
    <tgroup cols="4">
     <thead>
      <row>
      <p>xxxxxxxx</p>
       <entry>Title</entry>
       <entry>Author</entry>
       <entry>Language</entry>
       <entry>ISBN</entry>
      </row>
     </thead>
     <tbody name="bbbbb">
      <row>
       <entry>The Grapes of Wrath</entry>
       <entry>John Steinbeck</entry>
       <entry>en</entry>
       <entry>0140186409</entry>
        <p>xxxxxxxx1</p>
      </row>
      <row>
       <entry>The Pearl</entry>
       <entry>John Steinbeck</entry>
       <entry>en</entry>
       <entry>014017737X</entry>
      </row>
      <row>
       <entry>Samarcande</entry>
       <entry>Amine Maalouf</entry>
       <entry>fr</entry>
       <entry>2253051209</entry>
      </row>
      <!-- TODO: I have a lot of remaining books to add.. -->
     </tbody>
    </tgroup>
   </informaltable>
  </para>
 </chapter>
</book>
XML;
//$doc2 =$this->createDocument();
//$doc2->loadXML($source1);
//        $tbody = $doc2->getElementsByTagName('tbody')->item(0);
//        $xpath = new \DOMXPath($doc2);
        //$entries = $xpath->evaluate($query, $tbody);
        //$entries = $xpath->evaluate($query);
       // $xpath->registerNamespace("php", "http://php.net/xpath");
        //$query = 'p';
        //$query = '.';
        //$query = '..';
        //$query = '//chapter[@id]';
        //$xpath->registerPHPFunctions('sizeof');
        //$query = '//tbody/row[last()]';
        //$query = '//tbody/row[1]';
        //https://www.w3schools.com/xml/xpath_syntax.asp
        //$query = 'attribute::name';
        //$query = 'child::row';
        //$query = 'child::node()';
        //$query = 'descendant::row';
      //  $xpath->registerNamespace("php", "http://php.net/xpath");
// Регистрация PHP функций (без ограничений)
    //    $xpath->registerPHPFunctions();
// Вызов функции substr применительно к названию книги
       // $entries = $xpath->query('//book[php:function("sizeof", row)"]');
        //$query = '//tbody/following::row';
        //$entries = $xpath->evaluate($query, $tbody);
       // $entries = $xpath->query($query, $tbody);
        //$entries = $xpath->query($query);
//        foreach ($entries as $entr) {
//            echo '<hr /><br />'.$entr->nodeValue.'<br /><hr />';
//        }
//$type = $doc2->doctype;
       // echo "Есть $entries английские книги\n";
        $basePath = $this->reader->getModuleDir(
            \Magento\Framework\Module\Dir::MODULE_ETC_DIR,
            'Test_AllXmlFiles'
        );
        $xmlDir = $basePath . '/example.xml';
        $testSaveXml = $basePath.'/testsave.xml';

$simpleXml = new \SimpleXMLIterator($xmlDir,0, true);
        $call = $simpleXml->addChild('call','value call');
        $movie = $simpleXml->addChild('movie');
       // $simpleXml->addAttribute('xsi:type', 'documentary','http://pppcxzxczxczxczx/czxczxczx/ccc.org');
        $elem = $movie->xpath('/movies/movie/title');
        $elem[0]->addAttribute('testattr','sss');
        //echo $simpleXml->asXML($testSaveXml);
       $simpleXml->registerXPathNamespace('c','http://example.org/chapter-title');
        $el = $simpleXml->xpath('//c:movie');
        $name = $elem[0]->getName();
        //$child = $simpleXml->getChildren();
        //$attr = $simpleXml->attributes('http://pppcxzxczxczxczx/czxczxczx/ccc.org',true);
        $currentElem = $elem[0]->current();
        //echo $simpleXml->asXML();
       // $xmlIterator = new \SimpleXMLIterator('<books><book>Основы PHP</book><book>Основы XML</book></books>');
//        $xmlIterator->rewind();
//        var_dump( $xmlIterator->rewind());
//        $currentElem = $xmlIterator->getChildren();
        $cc = simplexml_load_file($xmlDir);
        $string = <<<XML
<?xml version='1.0'?> 
<document>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;

        $xml = simplexml_load_string($string);
        $dom = new \DOMDocument;
        $dom->loadXML('<books><book><title>чепуха</title></book></books>');
        if (!$dom) {
            echo 'Ошибка при разборе документа';
            exit;
        }

        $s = simplexml_import_dom($dom);

        echo $s->book[0]->title;
        die;
//$nameSpace = $simpleXml->getNamespaces(true);



        //$tag->item(0)->removeAttribute('name');
        $tag->item(0)->setAttribute('name', 'test_sets_attr');
        $tag->item(0)->setAttribute('newattr', 'test_new_attr');
        $attrSetElement = new \DOMAttr('test_object_set', 'test_object_set');
        //$attrSetElement = new \DOMElement('test_object_set','test_object_set');
        //$uElement->removeAttributeNS('http://www.example.com/XFoo1', 'ttt');
        $aElem->item(0)->setAttributeNode($attrSetElement);
        $attrSetElement = new \DOMAttr('ppp:test_object_set', 'test_object_set');
        $uElement->setAttributeNodeNS($attrSetElement);
        $uElement->setAttributeNS('http://www.example.com/XFoo2', 'ddd:ex','ppp');
        $doc1 = new \DOMDocument();
        $doc1->formatOutput = true;
        $doc1->loadXML('<book_repeat><book>Added book</book></book_repeat>');
        $nodeBook = $doc1->getElementsByTagName('book_repeat')->item(0);
        $node = $doc->importNode($nodeBook,true);
        $aElem->item(0)->setIdAttribute('test_object_set', 'true');
        $tt = $aElem->item(0)->getAttributeNode('test_object_set')->isId();
        $cloneElem  = $root->cloneNode(false);
        $line = $root->getLineNo();
        $tag->item(0)->appendChild($node);
        $attrName = $attr->getNamedItem('test_object_set');
        $attr = $tag->item(0)->attributes;
        $attr = $attr->getNamedItem('test_object_set');
//        $basePath = $this->reader->getModuleDir(
//            \Magento\Framework\Module\Dir::MODULE_ETC_DIR,
//            'Test_AllXmlFiles'
//        );
//       // $hmlFormatted = $xmlDir.'/test_create_html.xml';
//       // $xmlDir = $xmlDir . '/test_create.xml';
//       $xmlDir = $basePath . '/custom_xsd.xml';
//      // $doc->validateOnParse = true;
//        $doc->validateOnParse =true;
//       $doc->load($xmlDir);
       //$t = $doc->validate();
       //$shemaFile = $basePath .'/custom_xsd.xsd';
       //$t =  $doc->schemaValidate($shemaFile);
        //$doc->save($xmlDir);
        //$doc1->load($xmlDir);
        //$doc->saveHTMLFile($hmlFormatted);
//        echo $lisNs->item(0)->tagName;
//        echo $doc->namespaceURI;
//        echo $doc->documentURI;
       /// $doc1->normalizeDocument();

        $this->debug($doc);

    }

    public function createDocument()
    {
        return new \DOMDocument('1.0', "UTF-8");
    }

    public function debug($source)
    {
        $str = $source->saveXML();
        echo $str;
        die;
    }
}