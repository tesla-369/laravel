<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProductController extends Controller
{
public static $products = [
    ["id"=>"1", "name"=>"Nepal Silajit", "description"=>"Best Himalayan Silajit", "image" => "silajit.jpg", "price"=>"100"],
    ["id"=>"2", "name"=>"Mad Honey", "description"=>"This is purest mad honey, known as “cliff honey” or पागल मह, by the locals from high in the mountains of Lamjung Nepal", "image" => "nepali mad honey.jpg", "price"=>"100"],
    ["id"=>"3", "name"=>"DhakaTopi", "description"=>"Nepalese National traditional topi(hat)", "image" => "dhakatopi.jpg", "price"=>"30"],
    ["id"=>"4", "name"=>"Khukuri", "description"=>"Nepalese weapon khukuri", "image" => "khukuri.jpg", "price"=>"500"]
    ];
public function index()
    {
    $viewData = [];
    $viewData["title"] = "Products - Online Store";
    $viewData["subtitle"] = "List of products";
    $viewData["products"] = ProductController::$products;
    return view('product.index')->with("viewData", $viewData);
    }
public function show($id)
    {
    $viewData = [];
    $product = ProductController::$products[$id-1];
    $viewData["title"] = $product["name"]." - Himalayan 🇳🇵esthetic";
    $viewData["subtitle"] = $product["name"]." - Product information";
    $viewData["product"] = $product;
    return view('product.show')->with("viewData", $viewData);
    }
}
