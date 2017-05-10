<?php
namespace JsonLd\ContextTypes;
class Order extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'merchant' => Organization::class,
        'orderNumber' => null,
        'orderStatus' => null,
        'priceCurrency' => null,
        'price' => null,
        'acceptedOffer' => [],
        'url' => null,
        'priceSpecification.name' => null,
        'customer' => Person::class,
        'billingAddress' => PostalAddress::class
    ];
    
    /**
     * Set offers attributes.
     *
     * @param  mixed $values
     * @return array
     */
    protected function setAcceptedOfferAttribute($values)
    {
        if (is_array($values)) {
            foreach($values as $key => $value) {
                $values[$key] = $this->mapProperty([
                    'itemOffered' =>  Product::class,
                    'priceSpecification' => PriceSpecification:class,
                ], $value);
            }
        }
        return $values;
    }
}
