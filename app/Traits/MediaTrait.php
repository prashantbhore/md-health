<?php

namespace App\Traits;
use Str;

use Illuminate\Http\Request;

trait MediaTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function verifyAndUploadAPi(Request $request, $fieldname, $directory) {

        if( $request->$fieldname) {

            if (!$request->$fieldname->isValid()) {

                flash('Invalid File!')->error()->important();

                return redirect()->back()->with('error', 'Invalid File.');

            }

            $filename = time().Str::random(5).'.'.$request->$fieldname->getClientOriginalExtension();
            $filepath = $request->$fieldname->storeAs('public/'.$directory,$filename);

            return $filepath;

        }

        return null;

    }
    public function verifyAndUpload(Request $request, $fieldname, $directory) {

        if( $request->hasFile( $fieldname ) ) {

            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid File!')->error()->important();

                return redirect()->back()->with('error', 'Invalid File.');

            }

            $filename = time().Str::random(5).'.'.$request->file($fieldname)->getClientOriginalExtension();
            $filepath = $request->file($fieldname)->storeAs('public/'.$directory,$filename);

            return $filepath;

        }

        return null;

    }

}