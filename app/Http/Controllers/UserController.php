<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::with('products')->get();
        return view('user.user_dashboard', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function insertUsers()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'password',
                'role' => 'admin',
            ],
            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => 'password',
                'role' => 'manager',
            ],
            // Add more user data as needed
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        return 'Users inserted successfully.';
    }

    public function getProducts($id)
{
    $category = Category::findOrFail($id);
    $products = $category->products;
    return view('user.user_dashboard', compact('products'));
}

public function userInfo($id){
    // Retrieve the user by their ID
    $user = User::find($id);

    // Check if the user exists
    if ($user) {
        // Get the desired user information
        $username = $user->name;
        $email = $user->email;
        $id = $user->id;

        // You can now pass this information to your view
        return view('user.my-profile', [
            'username' => $username,
            'email' => $email,
            'id' => $id,
            'user' => $user, // Assign the $user variable
        ]);
    } else {
        // Redirect to the login page if the user doesn't exist
        return redirect()->route('login'); // Adjust the route name to match your actual login route
    }
}                          

}
