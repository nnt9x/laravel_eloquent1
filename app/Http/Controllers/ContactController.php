<?php

    namespace App\Http\Controllers;

    use App\Models\Contact;
    use Illuminate\Http\Request;

    class ContactController extends Controller
    {
        function viewAllContacts()
        {
//            SELECT * FROM contacts;
            $contacts = Contact::all();
            // dump data
            dd($contacts);
        }

        function viewContactById($id)
        {
            $contact = Contact::find($id);
            dd($contact);
        }

        function viewCreate()
        {
            // Thêm form tạo tại đây!
        }

        function save(Request $req)
        {

            $name = $req->get('name');
            $phone = $req->get('phone');
            $email = $req->get('email');

            // Lưu vào DB
            $contact = new Contact();
            $contact->full_name = $name;
            $contact->phone = $phone;
            $contact->email = $email;

            $rs = $contact->save();

            dd($rs);
        }

        function update(Request $req, $id)
        {
            // Lấy ra liên hệ đó
            $contact = Contact::find($id);

            if ($contact == null) {
                return "Không có liên hệ đó";
            }

            $name = $req->get('name');
            $phone = $req->get('phone');
            $email = $req->get('email');

//            dd($name, $phone, $email);

            if($name != null) {
                $contact->full_name = $name;
            }
            if($phone != null) {
                $contact->phone = $phone;
            }
            if($email != null) {
                $contact->email = $email;
            }

//            dd($contact);
            $rs = $contact->save();
//
            dd($rs);
        }

        function delete($id)
        {
            $contact = Contact::find($id);

            if ($contact == null) {
                return "Không có liên hệ đó";
            }

            $rs = $contact->delete();
            return $rs;
        }
    }
