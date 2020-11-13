<?php

class VS7_LimitSuggest_Model_Query extends Mage_CatalogSearch_Model_Query
{
    /**
     * Retrieve collection of suggest queries
     *
     * @return Mage_CatalogSearch_Model_Mysql4_Query_Collection
     */
    public function getSuggestCollection()
    {
        $collection = $this->getData('suggest_collection');
        if (is_null($collection)) {
            $collection = Mage::getResourceModel('catalogsearch/query_collection')
                ->setStoreId($this->getStoreId())
                ->setQueryFilter($this->getQueryText());
            $collection->getSelect()->limit(10);
            $this->setData('suggest_collection', $collection);
        }
        return $collection;
    }
}