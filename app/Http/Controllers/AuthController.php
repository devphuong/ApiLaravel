<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Storage; 

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->phone = $validatedData['phone'];

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public'); // 'storage/app/public/avatars'
            $user->avatar = $avatarPath;
        }

        $user->save();

        return response()->json(['status' => true, 'message' => 'User registered successfully', 'data' => $user], 201);
    }
    public function addproduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'category' => 'required|string',
            'detailed_description' => 'required|string',
            'short_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'promotional_price' => 'nullable|numeric|min:0',
            'imgproduct' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10000',
            'quantity' => 'required|min:0',
        ]);

        $imgProductPath = null;
        if ($request->hasFile('imgproduct')) {
            $imgProduct = $request->file('imgproduct');
            $imgProductPath = $imgProduct->store('public/imgproducts');
        }

        $albumPaths = [];
        if ($request->hasFile('album')) {
            foreach ($request->file('album') as $albumImage) {
                $albumPath = $albumImage->store('public/albums');
                $albumPaths[] = $albumPath;
            }
        }

        $pdfFilePath = null;
        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFilePath = $pdfFile->store('public/pdf');
        }

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->category = $request->input('category');
        $product->detailed_description = $request->input('detailed_description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        $product->promotional_price = $request->input('promotional_price');
        $product->imgproduct = $imgProductPath ? Storage::url($imgProductPath) : null;
        $product->album = $albumPaths ? json_encode($albumPaths) : null;
        $product->pdf_file = $pdfFilePath ? Storage::url($pdfFilePath) : null;
        $product->quantity = $request->input('quantity');
        $product->save();

        return response()->json([
            'status' => true,
            'message' => 'Product added successfully',
            'data' => $product,
        ], 201);
    }

    public function updateproduct(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        $validator = Validator::make($request->all(), [
            'category' => 'required|string',
            'product_name' => 'required|string',
            'detailed_description' => 'required|string',
            'short_description' => 'required|string',
            'price' => 'numeric|nullable|min:0',
            'promotional_price' => 'numeric|nullable|min:0',
            'imgproduct' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10000',
            'quantity' => 'required|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation error', 'data' => $validator->errors()], 422);
        }

        if ($request->hasFile('imgproduct')) {
            $imgProduct = $request->file('imgproduct');
            $imgProductPath = $imgProduct->store('public/imgproducts');
            $product->imgproduct = $imgProductPath ? Storage::url($imgProductPath) : $product->imgproduct;
        }

        $albumPaths = $product->album ? json_decode($product->album, true) : [];
        if ($request->hasFile('album')) {
            foreach ($request->file('album') as $albumImage) {
                $albumPath = $albumImage->store('public/albums');
                $albumPaths[] = $albumPath;
            }
            $product->album = json_encode($albumPaths);
        }

        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFilePath = $pdfFile->store('public/pdf');
            $product->pdf_file = $pdfFilePath ? Storage::url($pdfFilePath) : $product->pdf_file;
        }

        $product->update([
            'category' => $request->input('category'),
            'product_name' => $request->input('product_name'),
            'detailed_description' => $request->input('detailed_description'),
            'short_description' => $request->input('short_description'),
            'price' => $request->input('price'),
            'promotional_price' => $request->input('promotional_price'),
            'quantity' => $request->input('quantity'),
        ]);

        return response()->json(['message' => 'Thông tin sản phẩm đã được cập nhật', 'product' => $product], 200);
    }


    public function someMethod(Request $request)
    {
        
    }

    /**
     * Create a new AuthController instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'addproduct']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh());

    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    public function payload()
    {
        return $this->respondWithToken(JWTAuth::payload());
    }
}
    // Trực tiếp truy cập JWTFactoryz
    // protected function respondWithToken($token)
    // {
    //     $factory = app(JWTFactory::class);

    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => $factory->getTTL() * 60
    //     ]);
    // }