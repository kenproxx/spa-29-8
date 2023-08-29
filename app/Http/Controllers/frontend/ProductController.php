<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ResponseCustom;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;

class ProductController extends Controller
{
    public function getProductByID($id)
    {
        $response = new Response();
        try {

            $product = Product::where('id', $id)->get();
            if (!$product) {
                $msg = 'Không tìm thấy';
                $response->setContent($msg);
                return response()->json($response);
            }
            $response->setContent($product);
            return response()->json($response);
        } catch (Exception $exception) {

            $response->setContent($exception);
            return response()->json($response);
        }
    }

    public function getListSanPhamHot($thuoc_tinh = '')
    {
        $HOT = 'hot';
        $FLASH_SALE = 'flash_sale';
        $GIA_TOT = 'gia_tot';
        $THINH_HANH = 'thinh_hanh';
        $BAN_CHAY = 'ban_chay';
        $ON = 'on';
        $response = new Response();
        try {
            $columns = [$HOT, $FLASH_SALE, $GIA_TOT, $THINH_HANH, $BAN_CHAY];

            if (in_array($thuoc_tinh, $columns)) {
                $listProduct = Product::where($thuoc_tinh, $ON)
                    ->orderBy('created_at' , 'desc')
                    ->get();
            } else {
                $listProduct = '';
            }

            $response->setContent($listProduct);
            return response()->json($response);
        } catch (Exception $exception) {
            $response->setContent($exception->getMessage());
            return response()->json($response);
        }
    }
}
