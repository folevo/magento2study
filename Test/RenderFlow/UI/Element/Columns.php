<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.1.19
 * Time: 17.00
 */

namespace Test\RenderFlow\UI\Element;


use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Columns extends \Magento\Ui\Component\Listing\Columns
{
    /**
     * Default columns max order
     */
    const DEFAULT_COLUMNS_MAX_ORDER = 100;

    private $attributeProvaiderColumns;
    private $columnFactory;
    /**
     * @var array
     */
    protected $filterMap = [
        'default' => 'text',
        'select' => 'select',
        'boolean' => 'select',
        'multiselect' => 'select',
        'date' => 'dateRange',
    ];

    public function __construct(
        ContextInterface $context,
        \Test\RenderFlow\UI\Element\ProviderColumns\EavAttributeProvaiderColumns $attributeProvaiderColumns,
        \Magento\Catalog\Ui\Component\ColumnFactory $columnFactory,
        $components = [],
        array $data = []
    ) {
        $this->columnFactory = $columnFactory;
        $this->attributeProvaiderColumns = $attributeProvaiderColumns;
        parent::__construct($context, $components, $data);
    }
    /**
     * {@inheritdoc}
     */
    public function prepare()
    {
        $columnSortOrder = self::DEFAULT_COLUMNS_MAX_ORDER;
        $items = $this->attributeProvaiderColumns->getEmployeeAttribute()->getItems();
        foreach ($items as $attribute) {
            $config = [];
            if (!isset($this->components[$attribute->getAttributeCode()])) {
                $config['sortOrder'] = ++$columnSortOrder;
                $config['filter'] = $this->getFilterType($attribute->getFrontendInput());
                $config['editor']['editorType'] = 'text';
                $column = $this->columnFactory->create($attribute, $this->getContext(), $config);
                $column->prepare();
                $this->addComponent($attribute->getAttributeCode(), $column);
            }
        }
        parent::prepare();
    }

    /**
     * Retrieve filter type by $frontendInput
     *
     * @param string $frontendInput
     * @return string
     */
    protected function getFilterType($frontendInput)
    {
        return $this->filterMap[$frontendInput] ?? $this->filterMap['default'];
    }
}