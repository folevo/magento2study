<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 10.11.18
 * Time: 14.37
 */

namespace Test\Db\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Eav\Model\Entity\Increment\NumericValue;
use Test\Db\Model\TopicsRepository;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\FilterFactory;
use Magento\Framework\Api\Search\FilterGroupFactory;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrderFactory;
use Magento\Framework\Api\SortOrderBuilder;
use Test\Db\Model\ResourceModel\Topics;
use Test\Db\Model\TopicsFactory;
use Test\Db\Model\ResourceModel\Topics\CollectionFactory;
use Test\Db\Model\ResourceModel\Report\CollectionFactory as ReportCollectionFactory;
use Test\Db\Model\ResourceModel\Employee as EmployResource;
use Test\Db\Model\EmployeeFactory;
use Test\Db\Model\ResourceModel\Report;
use Test\Db\Model\ReportFactory;
use Test\Db\Model\AttributeFactory;
use Magento\Eav\Model\Entity\TypeFactory;
use Test\Db\Model\ReportRepository;

class Index extends Action
{
    private $topicsRepository;
    private $searchCriteriaBuilder;
    private $filterFactory;
    private $filterBuilder;
    private $filterGroupFactory;
    private $filterGroupBuilder;
    private $searchCriteria;
    private $sortOrderFactory;
    private $sortOrderBuilder;
    private $resourceTopics;
    private $topicsFactory;
    private $collectionFactory;
    private $employee;
    private $employeeFactory;
    private $reportFactory;
    private $reportResource;
    private $attributeFactory;
    private $typeFactory;
    private $reportCollFactory;
    private $reportRepository;

    public function __construct(
        TopicsRepository $topicsRepository,
        Action\Context $context,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterFactory $filterFactory,
        FilterBuilder $filterBuilder,
        FilterGroupFactory $filterGroupFactory,
        FilterGroupBuilder $filterGroupBuilder,
        SearchCriteriaInterface $searchCriteria,
        SortOrderFactory $sortOrderFactory,
        SortOrderBuilder $sortOrderBuilder,
        Topics $resourceTopics,
        TopicsFactory $topicsFactory,
        CollectionFactory $collectionFactory,
        EmployResource $employee,
        EmployeeFactory $employeeFactory,
        AttributeFactory $attributeFactory,
        TypeFactory $typeFactory,
        Report $report,
        ReportFactory $reportFactory,
        ReportCollectionFactory $reportCollFactory,
        ReportRepository $reportRepository
    ) {
        $this->reportFactory = $reportFactory;
        $this->reportResource = $report;
        $this->typeFactory = $topicsFactory;
        $this->attributeFactory = $attributeFactory;
        $this->employeeFactory = $employeeFactory;
        $this->employee = $employee;
        $this->collectionFactory = $collectionFactory;
        $this->resourceTopics = $resourceTopics;
        $this->topicsFactory = $topicsFactory;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->sortOrderFactory = $sortOrderFactory;
        $this->searchCriteria = $searchCriteria;
        $this->filterGroupFactory = $filterGroupFactory;
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->filterFactory = $filterFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->topicsRepository = $topicsRepository;
        $this->reportCollFactory = $reportCollFactory;
        $this->reportRepository = $reportRepository;
        parent::__construct($context);
    }

    public function execute()
    {
//        $filter1 = $this->filterFactory->create();
//        $filter2 = $this->filterFactory->create();
//        $filter1Group = $this->filterGroupFactory->create();
//        $filter2Group = $this->filterGroupFactory->create();
//        $filter1->setValue([1,2]);
//        $filter1->setField('id');
//        $filter1->setConditionType('in'); $filter1->setValue([1,2]);
//        $filter2->setField('id');
//        $filter2->setConditionType('in');
//        $filter2->setValue([3,4]);
//        $filter2Group->setFilters([$filter2]);
//        $filter1Group->setFilters([$filter1]);

        $collection = $this->collectionFactory->create();
        $conn = $collection->getConnection();
////        //$collection->setMainTable('example_test_change');
////        $tableName = $collection->getMainTable();
//        $conn = $collection->getConnection();
//        $collection->addFieldToFilter('id', ['in' => [3,4]]);
//        $conn = $collection->getResource()->getConnection();
//        $val = $conn->quote('SSS" pppp//!!!```');
//        $where = $conn->quoteInto('name = :id', 'ссс"mmm');
////        $sql = 'SELECT * FROM example_topics WHERE name = ?';
////        $query = $conn->quoteInto($sql, 'bbb"cbcbcbcb');
////        $sql = 'SELECT * FROM example_topics WHERE id  in(?)';
////        $query = $conn->quoteInto($sql, [1,2,3]);
////        $stm = $conn->query($query);
////        $t2 = $stm->fetchAll();
//        $sql = 'SELECT * FROM example_topics WHERE id  in(:id)';
//        //$conn->query($query);
//        $where = $conn->quote([1,2,3]);
//        $stm = $query = $conn->prepare($sql);
//        $stm->bindValue(':id', $where);
//        $stm->execute();
//        $t2 = $stm->fetchAll();
//        $insertRow = [
//            'name' => 'insert test',
//            'description' => 1,
//            'likes' =>15,
//            'is_hold' => 1
//        ];
//        $table = 'example_topics';
//        $t = $collection->fetchItem();
//        $t1 = $collection->fetchItem();
//        $insertRow = [
//            'name' => 'insert test',
//            'description' => 5,
//            'likes' => 2,
//            'is_hold' => 2
//        ];
//        $updateRow = [
//            'name'=>'updatetest'
//        ];
//        $where = $conn->quoteInto('id = ?', 4);
//        $conn->update($table, $updateRow, $where);
//        $where = $conn->quoteInto('name = ?', 'test4');
//        $conn->delete($table, $where);
//        $conn->insert($table, $insertRow);
//        $result1 = $conn->fetchAll(
//            "SELECT * FROM example_topics WHERE name LIKE :title",
//            array('title' => '%insert test%')
//        );
//        $result2 = $conn->fetchAssoc(
//            "SELECT * FROM example_topics WHERE name LIKE :title",
//            array('title' => '%insert test%')
//        );
//        $result3 = $conn->fetchCol(
//            "SELECT * FROM example_topics WHERE name LIKE :title",
//            array('title' => '%insert test%')
//        );
//        $result4 = $conn->fetchOne(
//            "SELECT * FROM example_topics WHERE name LIKE :title",
//            array('title' => '%insert test%')
//        );
//        $result5 = $conn->fetchPairs(
//            "SELECT * FROM example_topics WHERE name LIKE :title",
//            array('title' => '%insert test%')
//        );
//        $result6 = $conn->fetchRow(
//            "SELECT * FROM example_topics WHERE name LIKE :title",
//            array('title' => '%insert test%')
//        );
//        $result6 = $conn->fetchRow(
//            "SELECT * FROM example_topics WHERE name LIKE :title",
//            array('title' => '%insert test%')
//        );
//        $select = $conn->select();
//        $select->from(['p' => $table], ['pname'=>'p.name', 'plikes'=>'p.likes']);
//        $select->join(
//            ['eem'=>'example_eav_model_entity'],
//            'eem.entity_id = p.id',
//            ['type'=>'typ_id', 'eem.entity_id']
//        );
//        $select->distinct();
//        $select->orWhere('p.id > ? ', 1);
//        $select->orWhere('p.id < 4 ');
//        $select->group('p.id');
//        $select->having('p.id');
//        $select->order(['p.id desc', 'p.name desc']);
//        $select->forUpdate();
//        $select->limit(8, 10);
//        $t = $select->getPart(\Zend_Db_Select::COLUMNS);
//        $t = $select->getPart(\Zend_Db_Select::FROM);
//        $t = $select->getPart(\Zend_Db_Select::FOR_UPDATE);
//        $t = $select->getPart(\Zend_Db_Select::GROUP);
//        $t = $select->getPart(\Zend_Db_Select::HAVING);
//        $t = $select->getPart(\Zend_Db_Select::DISTINCT);
//        $t = $select->getPart(\Zend_Db_Select::ORDER);
//        $t = $select->getPart(\Zend_Db_Select::LIMIT_COUNT);
//        $t = $select->getPart(\Zend_Db_Select::LIMIT_OFFSET);
//        $t = $select->getPart(\Zend_Db_Select::WHERE);
//        $t = $select->__toString();
//        $select->reset(\Zend_Db_Select::GROUP);
//        $select->reset(\Zend_Db_Select::COLUMNS);
//        $select->columns('entity_id');
//        $t = $select->__toString();
//        die;
//        $stm = $conn->query($select);
//        $p = $stm->fetchAll();
//        $p1 = $select->query()->fetchAll();
//        $t = $select->__toString();
//        $collection->addExpressionFieldToSelect('e','{{t}}', ['t'=>'id']);
//        $collection->addExpressionFieldToSelect('e','{{p}}', ['p'=>'name']);
//        $collection->join(
//            ['e'=>'example_eav_model_entity'],
//            'e.entity_id=main_table.id',
//                   ['p' => 'name']
//
//        );
//       $collection->addFieldToSelect('likes', 'lk');
//       $collection->addFieldToSelect('likes', 'lk');
//        //$t = $collection->getSelect()->__toString();
//        $collection->removeFieldFromSelect('likes');
//        $collection->addFieldToSelect('name');
//        $collection->addFieldToSelect('description');
//       // $t = $collection->getSelect()->__toString();
//        //$collection->removeFieldFromSelect('*');
//        $collection->removeAllFieldsFromSelect();
//        $collection->removeAllFieldsFromSelect();
//        $collection->addFieldToSelect('description');
//    //    $t = $collection->getSelect()->__toString();
//        $collection->removeAllFieldsFromSelect();
////        $t = $collection->getSelect()->__toString();
////        $ids = $collection->getAllIds();
//        //$t = $collection->getIdFieldName();
//        //$t = $collection->getSelectSql(true);
//       // $size = $collection->getSize();
//        $collection->setOrder('id', 'DESC', true);
//        $collection->addFieldToSelect('likes');
//        $collection->getData();
//        //$collection->unshiftOrder('name', 'DESC');
//        $collection->addOrder('name', 'DESC');
//        $select = $conn->select();
//      //  $select->from(['cv'=> 'example_eav_model_entity']);
//      //  $select->where('cv.entity_id in(?)', [1,2,3,4]);
//       // $t = $select->__toString();
//     //   $collection->addFilterToMap('main_table.id', 'i');
//     //   //$collection->addFieldToFilter('id', ['in' =>[1,2,3]]);
//     //   $collection->addFieldToFilter(['id', 'main_table.name'], [['in'=>[1,2,3]],'insert test']);
////        $collection->load(true, true);
//     //   $collection->getData();
//       // $collection->addFilter('entity_id', ['in' => [1,2,4]], 'public');
//        $collection->addFilter('entity_id', 1, 'string');
//        $filter = $collection->getFilter('entity_id');
//       // $t = $collection->toOptionArray();
//        //$item = $collection->fetchItem();
//         $data = $collection->getData();
//        $t = $collection->getSelectSql(true);
//        $t = $collection->getColumnValues('id');
//        $ts = $collection->getItemsByColumnValue('name', 'ccc');
//         $t = $collection->getCurPage();
//         $item = $collection->getNewEmptyItem();
//         $item->addData(
//             ['name' => 'Php add', 'description' => 'Php add']
//         );
//         $collection->addItem($item);
//         $ids = $collection->getAllIds();
//         $collection->removeItemByKey(3);
//         $items = $collection->getItems();
////         foreach ($items as $item) {
////             $item->setName('ccc1');
////         }
//        //$collection->walk('save');
//       // $collection->each([$this->resourceTopics,'save']);
//        $name = 'ccc2';
////        $c = function ($item) use ($name) {
////           $item->setName($name);
////           $item->save();
////        };
//  //      $collection->each($c);
//        //$collection->setDataToAll('name', 'ccc3');
//        //$collection->setDataToAll(['name'=>'ccc3', 'id'=> 12]);
//        $xml = $collection->toXml();
//        //$arr = $collection->toArray();
//        $arr = $collection->toArray(['id']);
//        $itemById = $collection->getItemById(2);
//        $t = $collection->getSelect()->__toString();
//        $topic = $this->topicsFactory->create();
//        $this->resourceTopics->load($topic, 'insert test', 'name');
//        //$this->resourceTopics->save($topic);
////        $topic->isDeleted(true);
//        //$topic->setName('ccccccc2135');
//        //$topic->setData('name', ['id' => 3]);
//        //$topic->setData('p', [1,2,3]);
//        $b = $topic->hasData('xxx');
//        $c = $topic->hasData('name');
//        //$c = $topic->hasData([1]);
//        $origicData = $topic->getOrigData();
//        $dataHasChanged = $topic->dataHasChangedFor('name');
//        //$topic->setId(null);
//        //$topic->delete($topic);
//        $topic->setPC('pc');
//        $dataObject = new \Magento\Framework\DataObject();
//        $name = $topic->getDataUsingMethod('name');
//        $dataObject->addData(['id'=>1,'name'=>'ccccccccccc']);
////        $topic->setData('name', $dataObject);
//        //$data = $topic->getData('name/id');
//        $data = $topic->getData('p', 2);
//        $data = $topic->toArray(['name','id']);
//
//        $save = $topic->isSaveAllowed();
//        $isNew = $topic->isObjectNew(true);
//        $t = $topic->getResourceName();
//        $t = $topic->toXml(['id', 'name']);
//        $topic->getPC();
//        $table = $this->resourceTopics->getTable(['example_topics', 'pp','sss']);
//        $conn = $this->resourceTopics->getConnection();
//        $t = $topic->toString('{{id}} dasdsdasd','');
//        $topic->setDescription('sadsadasdas');
//        $topic->setId(null);
//        $topic->setDataChanges(true);
//        $topic->save();
//
//        die;
        //$topic->unsetData();
//        $this->resourceTopics->save($topic);
//        $validator = new \Zend_Validate_EmailAddress();
//        $vm = $validator->getMessageVariables();
//        $validator->setMessage('ppppannnnnnnnnnnnnnnnnnnnn', 'ppp messagepppppppppppp');

//        if ($validator->isValid('ppp')) {
//            // email прошел валидацию
//        } else {
//            // email не прошел валидацию; вывод причин этого
//            foreach ($validator->getMessages() as $messageId => $message) {
//                echo "Validation failure '$messageId': $message\n";
//            }
//        }
//        die;
//        $sort = $this->sortOrderFactory->create();
//        $sort->setDirection('Desc')
//            ->setField('id');
//        ;
//        $filter1 = $this->filterBuilder->setValue('test')
//            ->setField('name')
//            ->create()
//        ;
//        $filter2 = $this->filterBuilder
//            ->setField('id')
//            ->setValue([3,4])
//            ->setConditionType('in')
//            ->create()
//        ;
//        $topic = $this->topicsFactory->create();
//        $topic->setName('test4');
//        $topic->setDescription('test4');
//        $topic->setDescription(1);
//        $topic->setLikes(12);
//        $topic->setIsHold(12);
//        $this->resourceTopics->save($topic);
//        $filter1Group = $this->filterGroupBuilder->addFilter($filter1)->create();
//        $filter2Group = $this->filterGroupBuilder->addFilter($filter2)->create();
//        $this->searchCriteriaBuilder->addFilters([$filter1]);
//        $this->searchCriteriaBuilder->setFilterGroups([$filter1Group]);
//        $sort1 = $this->sortOrderFactory->create();
//        $sort2 = $this->sortOrderFactory->create();
//        $sort1->setField('id');
//        $sort1->setDirection('ASC');
//        $sort2->setField('name');
//        $sort2->setDirection('DESC');
////        $this->searchCriteriaBuilder->addSortOrder($sort1);
////        $this->searchCriteriaBuilder->addSortOrder($sort2);
//        $this->searchCriteriaBuilder->setSortOrders([$sort1, $sort2]);
//        $this->searchCriteriaBuilder->setCurrentPage(1);
//        $this->searchCriteriaBuilder->setCurrentPage(2);
//        $this->searchCriteriaBuilder->setPageSize(1);
//        $this->topicsRepository->getList($this->searchCriteriaBuilder->create());
//        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
//        $employee = $this->employeeFactory->create();
//
//        $emp = $this->employee->load($employee,1);
//
//        $eavconfig = $this->employee->getConfig();
//        $entityType = $eavconfig->getEntityType('test_db_employee');
//        $attribute = $eavconfig->getAttribute('test_db_employee', 'salary');
//        $entityType->loadByCode('customer');
//        $entityType->fetchNewIncrementId(1);
//        $t = $entityType->getEntityIdField();
//        $t = $entityType->getEntityTable();
//        $t = $entityType->getAttributeSetCollection();
//        $data = $t->getData();
//        $t1 = $entityType->getValueTablePrefix();
//        $t1 = $entityType->getDefaultAttributeSetId();
//        $sql = $t->getSelectSql(true);
//        //$entityType = $this->typeFactory->create();
//        $attributeCollection = $entityType->getAttributeCollection(17);
//        $data = $attributeCollection->getData();
//        $sql = $attributeCollection->getSelectSql(true);
//       // $t = $eavconfig->getAttribute('test_db_employee','salary');
//        $setAttribute = new \Magento\Framework\DataObject(['p'=>1,'k'=>1]);
//        $eavconfig->getAttributes($eavconfig->getEntityType('customer'), $setAttribute);
//        $attribute = $this->attributeFactory->create();
//        $attribute->setWebsite(1);

//        $report = $this->reportFactory->create();
//        $this->reportResource->load($report, 11);
////        $reportColl = $this->reportCollFactory->create();
////        $reportColl->addAttributeToFilter('test_int', 1);
//        $report->setDataChanges(true);
//        $report1 = $this->reportFactory->create();
//        $report1->addData($report->getData());
//        $this->reportResource->save($report1);
//       $reportCollection = $this->reportCollFactory->create();
//       $reportCollection->addAttributeToSelect('test_int', 'left');
//       //$reportCollection->addAttributeToFilter('test_int', 3);
//       var_dump($reportCollection->getData()); echo '<hr />';
//       $reportCollection->load(true);
//       foreach ($reportCollection as $item) {
//           var_dump($item->getData());
//       }
        $filter1 = $this->filterBuilder->create();
        $report = $this->reportFactory->create();
        $report->setContent(1);
        $report->setState(1);
        $report->setStatus(1);
        $report = $this->reportRepository->get(13);
        //$this->reportRepository->save($report);
        $this->reportRepository->delete($report);
        die;
        //$eavconfig->getEntityAttributeCodes('test_db_employee');
        //return $result;
    }
}