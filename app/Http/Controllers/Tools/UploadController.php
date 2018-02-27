<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Services\UploadsManager;
use Illuminate\Http\Request;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use Illuminate\Support\Facades\File;
use Session;
class UploadController extends Controller
{
  protected $manager;
 
  public function __construct(UploadsManager $manager)
  {
    $this->manager = $manager;
         $this->middleware('admin');
  }

  /**
   * Show page of files / subfolders
   */
  public function index(Request $request)
  {
    $folder = $request->get('folder');
    $data = $this->manager->folderInfo($folder);

    return view('tools.upload.index', $data);
  }
  /**
   * Create a new folder
   */
  public function createFolder(UploadNewFolderRequest $request)
  {
    $new_folder = $request->get('new_folder');
    $folder = $request->get('folder').'/'.$new_folder;

    $result = $this->manager->createDirectory($folder);

    if ($result === true) {
      Session::flash('success',"Folder '$new_folder' created.");
      return redirect()->back();
    }

    $error = $result ? : Session::flash('error',"An error occurred creating directory.");
    return redirect()
        ->back()
        ->withErrors([$error]);
  }

  /**
   * Delete a file
   */
  public function deleteFile(Request $request)
  {
    $del_file = $request->get('del_file');
    $path = $request->get('folder').'/'.$del_file;

    $result = $this->manager->deleteFile($path);

    if ($result === true) {
      Session::flash('success',"File '$del_file' deleted.");      
      return redirect()
          ->back();
    }

    $error = $result ? :   Session::flash('error', "An error occurred deleting file.");
    return redirect()
        ->back()
        ->withErrors([$error]);
  }

  /**
   * Delete a folder
   */
  public function deleteFolder(Request $request)
  {
    $del_folder = $request->get('del_folder');
    $folder = $request->get('folder').'/'.$del_folder;

    $result = $this->manager->deleteDirectory($folder);

    if ($result === true) {
      Session::flash('success',"Folder '$del_folder' deleted.");
      return redirect()
          ->back();
    }

    $error = $result ? : Session::flash('error',"An error occurred deleting directory.");
    return redirect()
        ->back()
        ->withErrors([$error]);
  }

  /**
   * Upload new file
   */
  public function uploadFile(UploadFileRequest $request)
  {
    $file = $_FILES['file'];
    $fileName = $request->get('file_name');
    $fileName = $fileName ?: $file['name'];
    $path = str_finish($request->get('folder'), '/') . $fileName;
    $content = File::get($file['tmp_name']);

    $result = $this->manager->saveFile($path, $content);

    if ($result === true) {
      Session::flash('success',"File '$fileName' uploaded.");      
      return redirect()
          ->back();
    }

    $error = $result ? : Session::flash('error',"An error occurred uploading file.");
    return redirect()
        ->back()
        ->withErrors([$error]);
  }

}
