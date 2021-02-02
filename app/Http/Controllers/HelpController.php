<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class HelpController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deleteAllHelps(){
        auth()->user()->userHelp->help_home = 0;
        auth()->user()->userHelp->help_subasta_rapida = 0;
        auth()->user()->userHelp->help_infoPerfil = 0;
        auth()->user()->userHelp->help_comentariosPerfil = 0;
        auth()->user()->userHelp->help_subastaPujas = 0;
        auth()->user()->push();
    }
    public function addAllHelps(Request $request){
        auth()->user()->userHelp->help_home = 1;
        auth()->user()->userHelp->help_subasta_rapida = 1;
        auth()->user()->userHelp->help_infoPerfil = 1;
        auth()->user()->userHelp->help_comentariosPerfil = 1;
        auth()->user()->userHelp->help_subastaPujas = 1;
        auth()->user()->push();
        return redirect()->back();
    }
    public function deleteOneHelpSubRap(){
        auth()->user()->userHelp->help_subasta_rapida = 0;
        auth()->user()->push();
    }
    public function deleteOneHelpHome(){
        auth()->user()->userHelp->help_home = 0;
        auth()->user()->push();
    }
    public function deleteOneHelpInfoPerfil(){
        auth()->user()->userHelp->help_infoPerfil = 0;
        auth()->user()->push();
    }
    public function deleteOneHelpCommentPefil(){
        auth()->user()->userHelp->help_comentariosPerfil = 0;
        auth()->user()->push();
    }
    public function deleteOneHelpSubPuj(){
        auth()->user()->userHelp->help_subastaPujas = 0;
        auth()->user()->push();
    }
}
