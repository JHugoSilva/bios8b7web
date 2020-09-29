<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Link;
use App\Models\View;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page) {
            /**BACKGROUNG */
            $bg = '#000';
            switch($page->op_bg_type){
                case 'image':
                    $bg="url('".url('/media/uploads').'/'.$page->op_bg_value."')";
                break;
                case 'color':
                    $colors = explode(',', $page->op_bg_value);
                    $bg = 'linear-gradient(90deg,';
                    $bg .= $colors[0].',';
                    $bg .= !empty($colors[1])?$colors[1]:$colors[0];
                    $bg .= ')';
                break;
            }
            /**LINKS */
            $links = Link::where('page_id',$page->id)
            ->where('status',1)
            ->orderBy('order')
            ->get();

            //REGISTRAR VISUALIZACAO FAKE
            $view = View::firstOrNew([
                'page_id'=>$page->id, 'view_date'=>date('Y-m-d')
            ]);
            $view->total++;
            $view->save();
            return view('page', [
                'font_color' => $page->op_font_color,
                'profile_image' => url('/media/uploads') . '/' . $page->op_profile_image,
                'title' => $page->op_title,
                'description' => $page->op_description,
                'fb_pixel' => $page->op_fb_pixel,
                'bg' => $bg,
                'links' => $links
            ]);
        } else {
            echo "Não Achooo...";
        }

        /*$page = Page::where('slug', $slug);
        if ($page) {
            $bg = '#FFFFFF';
            switch ($page->op_bg_type) {
                case 'image':
                    $bg = "url('" . url('/media/uploads') . '/' . $page->ob_bg_type . "')";
                    break;
                case 'color':
                    $colors = explode(',', $page->op_bg_value);
                    $bg .= 'linear-gradient(90deg,';
                    $bg .= $colors[0];
                    $bg .= !empty($colors[1]) ? $colors[1] : $colors[0];
                    $bg .= ')';
                    break;
            }
            $links = Link::where('id_page', $page->id)
                ->where('status', 1)
                ->orderBy('order')
                ->get();
            $view = View::firstOrNew(['id_page' => $page->id, 'view_date' => date('Y-m-d')]);
            $view->total++;
            $view->save();

            return view('page', [
                'font_color' => $page->op_font_color,
                'profile_image' => url('/media/uploads') . '/' . $page->op_page,
                'title' => $page->op_title,
                'description' => $page->op_fb_pixel,
                'fb_pixel' => $page->op_fb_pixel,
                'bg' => $bg,
                'links' => $links
            ]);
        } else {
            return view('notfound');
        }*/
    }
}
