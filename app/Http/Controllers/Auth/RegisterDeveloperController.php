<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Portfolio;

class RegisterDeveloperController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Developer';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request->get
     * @return \App\User
     */
    protected function create(Request $request)
    {
        //dd($request->education_to_month);
        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required', 'string','max:30'],
            'birth_month' => ['required', 'string'],
            'birth_day' => ['required', 'string'],
            'birth_year' => ['required', 'string'],
            'university' => ['required', 'string','max:200'],
            'university_country' => ['required', 'string', 'max:50'],
            'level1' => ['required', 'string','max:50'],
            'specialization' => ['required', 'string', 'max:100'],
            'education_from_month' => [ 'string'],
            'education_from_year' => [ 'string'],
            'education_to_month' => [ 'string'],
            'education_to_year' => [ 'string'],
            'education_language' => ['string','max:30'],
            'experience_company' => ['string', 'max:50'],
            'experience_position' => ['string','max:50'],
            'education_from_month_experience' => ['string'],
            'education_from_year_experience' => ['string'],
            'education_to_month_experience' => ['string'],
            'education_to_year_experience' => ['string'],
            'experience_description' => ['string', 'max:500'],
            'resume' => [],
            'source' => ['required', 'string', 'max:50'],
            'availability' => ['required', 'string','max:30'],
            'additional_info' => ['required', 'string', 'max:150'],
        ]);
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);
        Portfolio::create([
            'birth-month' => $request->birth_month,
            'birth-day' => $request->birth_day,
            'birth-year' => $request->birth_year,
            'university' => $request->university,
            'university-country' => $request->university_country,
            'level1' => $request->level1,
            'specialization' => $request->specialization,
            'education-from-month' => $request->education_from_month,
            'education-from-year' => $request->education_from_year,
            'education-to-month' => $request->education_to_month,
            'education-to-year' => $request->education_to_year,
            'education-language' => $request->education_language,
            'experience-company' => $request->experience_company,
            'experience-position' => $request->experience_position,
            'education-from-month-experience' => $request->education_from_month_experience,
            'education-from-year-experience' => $request->education_from_year_experience,
            'education-to-month-experience' => $request->education_to_month_experience,
            'education-to-year-experience' => $request->education_to_year_experience,
            'experience-description' => $request->experience_description,
            'resume' => $request->resume,
            'source' => $request->source,
            'availability' => $request->availability,
            'additional-info' => $request->additional_info,
            'email' => $request->email,
        ]);
        return redirect()->route('login'); 
    }
}
