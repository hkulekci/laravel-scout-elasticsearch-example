<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Elastic\Elasticsearch\Client;
use Illuminate\Http\Request;
use Matchish\ScoutElasticSearch\ElasticSearch\EloquentHitsIteratorAggregate;
use Matchish\ScoutElasticSearch\MixedSearch;
use ONGR\ElasticsearchDSL\Aggregation\Metric\MaxAggregation;
use ONGR\ElasticsearchDSL\Aggregation\Metric\MinAggregation;
use ONGR\ElasticsearchDSL\Highlight\Highlight;
use ONGR\ElasticsearchDSL\Search;

class ProductsController extends Controller
{
    public function index(Request $request, Client $client)
    {
        $query = [
            'match' => [
                'name' => $request->get('query')
            ]
        ];

        return response()->json($client->search([
            'index' => 'products_version',
            'body' => $query
        ])->asArray());












//        $results = Product::search('*')->cursor();
////        $builder = MixedSearch::search('*')->within(implode(',', [
////            (new Product())->searchableAs(),
////            (new Attribute())->searchableAs(),
////        ]));
////
////        $results = $builder->cursor();
//
//        return response()->json($results);

//        $results = Product::search('*', static function (Client $client, Search $body) {
//
//            $minPriceAggregation = new MinAggregation('min_price');
//            $minPriceAggregation->setField('price');
//
//            $maxPriceAggregation = new MaxAggregation('max_price');
//            $maxPriceAggregation->setField('price');
//
//            $body->addAggregation($minPriceAggregation);
//
//            return $client->search(['index' => 'products', 'body' => $body->toArray()]);
//        })->raw();
//
//        $aggregator = new EloquentHitsIteratorAggregate($results);
//        dd($results);

$results = Product::search('*',
    static function (Client $client, Search $body) {
        $highlight = new Highlight();
        $highlight->addField('name');
        $body->addHighlight($highlight);
        return $client->search(['index' => 'products', 'body' => $body->toArray()])->asArray();
    })->raw();
$iterator = new EloquentHitsIteratorAggregate($results);
dd($iterator);

        return response()->json($results);
    }

    public function show(Request $request, $id)
    {
        $results = Product::create([
            'name' => 'Product ' . $id,
            'price' => $id * 100,
            'discounted_price' => $id * 50,
            'description' => 'Product ' . $id . ' description',
        ]);

        return response()->json($results);
    }
}
