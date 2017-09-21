<?php

namespace App\Http\Controllers;

use App\User;
use App\Chatmess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SitesoftController extends Controller
{
    /**
     * ѕоказать главную страницу
     *
     * @return Response
     */
	public function showmain()
	{
		$ms = Chatmess::orderBy('created_at', 'desc')->get();
		return view('sitesoft.main', ['mesres' => $ms]);
	}
  
    /**
     * ¬вод нового/редактирование сообщени€
     *
     * @return Response
     */   
    public function editchatmess(Request $request) 
    {
		if (Auth::check()) {
			if ($request->id) {
				$CHM = Chatmess::find($request->id);
				if ($CHM && Auth::user()->canEdit($CHM)) {
					$CHM->text = $request->text;
					$CHM->save();	
				}
			} else {
				if (Auth::user()->canAdd()) {
					$CHM = new Chatmess();
					$CHM->user_id = Auth::user()->id;
					$CHM->text = $request->text;
					$CHM->save();
				}
			}
		}
		return $this->actualList();
    }
  
     /**
     * удаление сообщени€
     *
     * @return Response
     */   
    public function delchatmess($id) 
    {
		$CHM = Chatmess::find($id);
		
		if ($CHM && Auth::check() && Auth::user()->canDelete($CHM)) {
			$CHM->delete();
		}
		return $this->actualList();
    }
	
    /**
     * загрузка сообщени€
     *
     * @return Response
     */   
    public function loadchatmess($id) 
    {
		$CHM = Chatmess::find($id);
		
		if ($CHM && Auth::check() && Auth::user()->canEdit($CHM)) {
			return ['text' => $CHM->text, 'id' => $CHM->id];
		}
		return ['text' => '', 'id' => 0];
    }	
	
 	/**
	 *  вывод актуального списка 
	 */
	public function actualList() {
		$ms = Chatmess::orderBy('created_at', 'desc')->get();
		return view('sitesoft.datasheet', ['elms' => $ms]);		
	}
 
}