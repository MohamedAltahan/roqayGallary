<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\EmailInboxDataTable;
use App\Http\Controllers\Controller;
use App\Models\EmailInbox;

class EmailInboxController extends Controller
{
    public function index(EmailInboxDataTable $dataTable)
    {
        return $dataTable->render('admin.email-inbox.index');
    }

    public function show($id)
    {
        $message = EmailInbox::findOrFail($id);

        return view('admin.email-inbox.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = EmailInbox::findOrFail($id);
        $message->delete();
        return response(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}
