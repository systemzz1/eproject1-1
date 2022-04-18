<?php

namespace App\Http\Controllers;

use App\repos\eproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\ImageManagerStatic as Image;

class eprojectController extends Controller
{


    public function admin()
    {


        return view('masters.admin_home'
            ,[
                'location' => 'admin_home'
            ]


        );
    }
    //category
    public function index_category()
    {

        $category = eproject::getAllCategory();

        return view('masters.index_category'
            ,[
                'location' => 'admin_index'
            ],
            [
                'category' => $category
            ]
        );
    }

    public function show_category($id)
    {
        $category = eproject::getCategoryById($id);
        return view('category.show_category',
            [
                'category' => $category[0],
            ]
        );
    }

    public function form_category()
    {
        return view('category.new_categories',
            ["category" => (object)
                [
                    'id' => '',
                    'name' => '',
    //                'image' => '',
                    'description' => ''
                ]
            ],
            [
                'location' => 'new_category'
            ]
        );
    }

    public function store_category(Request $request)
    {


        $this->formValidate_category($request)->validate();

        //lay image_name
        $image = $request->file('image'); //lay file

        $name = $image->getClientOriginalName(); //lấy tên file do người dùng upload

       //store image to `public/admin_upload` folder
        //function move('directory', $ten_anh ) root folder la public co the tu tao thu muc vi du o day la image
        // $ten_anh cai nay tuy chinh? ở đây đang lưu là tên gốc do người dùng upload
        $image->move('img/admin_upload', $name );


        //store image_name to database as text
        $category = (object)[
            'name' => $request->input('name'),
            'image' => $name,
            'description' => $request->input('description'),
        ];
        $newId = eproject::insert_category($category);

        return redirect()
            ->action('eprojectController@index_category')
            ->with('status', 'New category with id: '.$newId . ' has been created');
    }


    public function confirm_category($id){
        $category= eproject::getCategoryById($id);
        return view('category.confirm_category',
            [
//                'id' => $id,
                'category'=> $category[0],
            ]
        );
    }

    public function delete_category(Request $request, $id)
    {
        if ($request->input('id') != $id) {
            //id in query string must match id in hidden input
            return redirect()->action('eprojectController@index_category');
        }

        eproject::delete_category($id);


        return redirect()->action('eprojectController@index_category')
            ->with('status', 'Delete Category with id: '.$id .' Successfully');
    }


    public function edit_category($id)
    {
        $category = eproject::getCategoryById($id);
        return view(
            'category.edit_category',
            [
                'category'=>$category[0]
            ]
        );
    }

    public function update_category(Request $request, $id)
    {
        if ($id != $request->input('id')) {
            //id in query string must match id in hidden input
            return redirect()->action('eprojectController@index_category');
        }

        $this->formValidate_category($request)->validate(); //shortcut

        //xu li file anh
        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        //

        $image->move('img/admin_upload', $name );

        $category = (object)[
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'image' => $name,
            'description' => $request->input('description')
        ];
        eproject::update_category($category);

        return redirect()->action('eprojectController@index_category')
            ->with('status', 'Category Update Successfully');
    }


    private function formValidate_category($request)
    {
        return Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'image'=> ['required', 'mimes:jpg,png', 'max:2000'],
                'description'=> ['required']
            ],
        );
    }

    //product





    public function index_product()
    {
        $product = eproject::getAllProduct();

        return view('masters.index_product'
            ,[
                'location' => 'admin_index'
            ],
            [
                'product' => $product
            ]
        );
    }

    public function show_product($id)
    {
        $product = eproject::getProductById($id);
        $category = eproject::getAllCategory();
        return view('product.show_product',
            [
                'product' => $product[0],
                'category' => $category
            ]
        );
    }

    public function form_product()
    {
        $category = eproject::getAllCategory();
        return view('product.new_product',
            ["product" => (object)
            [
                'id' => '',
                'categoryid' => '',
                'name' => '',
                'weight' => '',
                'price' => '',
                'description' => '',
                'brand' => '',
                'country_of_origin' => '',
                'expiration_date' => '',
                'manufacturer' => '',
                'image' => ''
            ]
            ],
            [
                'category' => $category,
                'location' => 'new_product'
            ]
        );
    }

    public function store_product(Request $request)
    {
//        dd($request);
        $this->formValidate_product($request)->validate(); //shortcut

        $image = $request->file('image');
        $name = $image->getClientOriginalName();

        //store image to `public/admin_upload` folder
        $image->move('img/admin_upload', $name );

        //store image_name to database
        $product = (object)[
            'categoryid' => $request->input('categoryid'),
            'name' => $request->input('name'),
            'weight' => $request->input('weight'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'brand' => $request->input('brand'),
            'country_of_origin' => $request->input('country_of_origin'),
            'expiration_date' => $request->input('expiration_date'),
            'manufacturer' => $request->input('manufacturer'),
            'image' => $name

        ];
        $newId = eproject::insert_product($product);

        return redirect()
            ->action('eprojectController@index_product')
            ->with('status', 'New product with id: '.$newId. 'has been created');
    }


    public function confirm_product($id){
        $product= eproject::getProductById($id);
        return view('product.confirm_product',
            [
//                'id' => $id,
                'product'=> $product[0],
            ]
        );
    }

    public function delete_product(Request $request, $id)
    {
        if ($request->input('id') != $id) {
            return redirect()->action('eprojectController@index_product');
        }

        eproject::delete_product($id);


        return redirect()->action('eprojectController@index_product')
            ->with('status', 'Delete Product Successfully');
    }


    public function edit_product($id)
    {
        $product = eproject::getProductById($id);
        $category = eproject::getAllCategory();
        return view(
            'product.edit_product',
            [
                'product'=>$product[0],'category'=> $category
            ]
        );
    }

    public function update_product(Request $request, $id)
    {
//        dd($request);
        if ($id != $request->input('id')) {
            return redirect()->action('eprojectController@index_product');
        }

        $this->formValidate_product($request)->validate(); //shortcut


        $image = $request->file('image');
        $name = $image->getClientOriginalName();

        $image->move('img/admin_upload', $name );

        $product = (object)[
            'name' => $request->input('name'),
            'id' => $request->input('id'),
            'weight' => $request->input('weight'),
            'price' => $request->input('price'),
            'categoryid' => $request->input('categoryid'),
            'description' => $request->input('description'),
            'brand' => $request->input('brand'),
            'country_of_origin' => $request->input('country_of_origin'),
            'expiration_date' => $request->input('expiration_date'),
            'manufacturer' => $request->input('manufacturer'),
            'image' => $name
        ];
        eproject::update_product($product);

        return redirect()->action('eprojectController@index_product')
            ->with('status', 'Product Update Successfully');
    }


    private function formValidate_product($request)
    {
        return Validator::make(
            $request->all(),
            [

                'name' => ['required'],
                'weight' => ['required','gt:0'],
                'price' => ['required','gt:10'],
                'categoryid' => ['required'],
                'description' => ['required'],
                'brand' => ['required'],
                'country_of_origin' => ['required'],
                'expiration_date' => ['required'],
                'manufacturer' => ['required'],
                'image' => ['required', 'mimes:jpg,png', 'max:2000'],

            ],
        );
    }



    //service

}
