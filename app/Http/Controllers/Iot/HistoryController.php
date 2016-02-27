<?php
namespace App\Http\Controllers\Iot;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller {

	public function index() {
		return view('echarts')->withTitle('监控系统主页');
	}
}
