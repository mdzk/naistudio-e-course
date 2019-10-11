<?php

namespace App\Http\Controllers;

use App\KategoriModel;
use App\MateriModel;
use App\VideoModel;
use Illuminate\Http\Request;
use DB;

class LoadMoreController extends Controller
{
    public function index()
    {
     return view('kursus_load');
    }

    public function load_data(Request $request) {
     	if($request->ajax()) {
      		if($request->id > 0) {
      			$materi   = MateriModel::where('id', '<', $request->id)->orderBy('id', 'DESC')->limit(8)->get();
      		} else {
		        $materi   = MateriModel::orderBy('id', 'DESC')->limit(8)->get();

      		}
      		
      		$output = '';
      		$last_id = '';
	      	if(!$materi->isEmpty()) {
	       		foreach($materi as $row) {
	       			
			        $output .= '
			        <div class="content-item">
						<div class="thumb" style="background-image: url('. url("/assets/img/materi/$row->gambar").')">
							<div class="label btn-warning">'.$row->kategori->nama_kategori.'</div>
						</div>
						<div class="desc-item">
							<p><a href="">'.$row->nama_materi.'</a></p>
							<div class="teacher">
								
							</div>
							<div class="clearfix"></div>
							<div class="status">
								
								<div class="right-status">
									<p>
										
									</p>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
			        ';
			        $last_id = $row->id;
	       		}

		       	$output .= '
		       		<div id="load_more" style="width: 100%; margin-bottom: 50px" class="text-center">
		        		<button type="button" name="load_more_button" class="btn btn-primary" data-id="'.$last_id.'" id="load_more_button"><i class="fa fa-sync"></i>&nbsp;Load More</button>
		       		</div>
		       	';
	      	} else {
	       		$output .= '
	       		<div id="load_more" style="width: 100%; margin-bottom: 50px" class="text-center">
	        		<button type="button" name="load_more_button" class="btn btn-info" disabled>No Data Found</button>
	       		</div>
	       		';
	      	}
	      	echo $output;
     	}
    }
}

?>