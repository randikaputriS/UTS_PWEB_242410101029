<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $username = $request->input('username');

        if (empty($username)) {
            return redirect()->route('login')->with('error', 'Username tidak boleh kosong!');
        }

        return redirect()->route('dashboard', ['username' => $username]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Tamu');

        $stats = [
            ['label' => 'Total Menu',     'value' => 12, 'icon' => '🍽️'],
            ['label' => 'Kategori',        'value' => 5,  'icon' => '📂'],
            ['label' => 'Menu Tersedia',   'value' => 9,  'icon' => '✅'],
            ['label' => 'Menu Habis',      'value' => 3,  'icon' => '❌'],
        ];

        return view('dashboard', compact('username', 'stats'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Tamu');

        $profileData = [
            'nama'      => $username,
            'role'      => 'Admin',
            'email'     => strtolower($username) . '@cafekalcer.com',
            'telepon'   => '+62 812-3456-7890',
            'alamat'    => 'Jl. Raya Favorit Admin No. 02, Sawit',
            'joined' => 'Januari 2024',
        ];

        return view('profile', compact('username', 'profileData'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Tamu');

        $menuList = [
            [
                'id'       => 1,
                'nama'     => 'Nasi Goreng Spesial',
                'kategori' => 'Makanan Berat',
                'harga'    => 16000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://www.cookmeindonesian.com/wp-content/uploads/2020/04/nasi-goreng-final.jpg',
            ],
            [
                'id'       => 2,
                'nama'     => 'Pistachio Latte',
                'kategori' => 'Minuman',
                'harga'    => 18000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://hannahcooking.com/wp-content/uploads/2025/04/Pistachio-latte-cup-768x768.jpg',
            ],
            [
                'id'       => 3,
                'nama'     => 'Brew V60',
                'kategori' => 'Minuman',
                'harga'    => 20000,
                'status'   => 'Habis',
                'gambar'   => 'https://cftproastingco.com.au/wp-content/uploads/2022/09/hairo-v60-brew-guide.png',
            ],
            [
                'id'       => 4,
                'nama'     => 'Pisang Coklat',
                'kategori' => 'Snack',
                'harga'    => 15000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://i.ytimg.com/vi/Ipi7pU22rd8/maxresdefault.jpg',
            ],
            [
                'id'       => 5,
                'nama'     => 'Americano Iced',
                'kategori' => 'Minuman',
                'harga'    => 13000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://mocktail.net/wp-content/uploads/2022/03/homemade-Iced-Americano-recipe_1.jpg',
            ],
            [
                'id'       => 6,
                'nama'     => 'Cappucino Latte',
                'kategori' => 'Minuman',
                'harga'    => 18000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://images.ctfassets.net/v601h1fyjgba/71VWCR6Oclk14tsdM9gTyM/6921cc6b21746f62846c99fa6a872c35/Iced_Latte.jpg',
            ],
            [
                'id'       => 7,
                'nama'     => 'Mochaccino Iced',
                'kategori' => 'Minuman',
                'harga'    => 18000,
                'status'   => 'Habis',
                'gambar'   => 'https://grindthosebeans.com/wp-content/uploads/2025/01/Iced-Mochaccino-Recipe-Simple-Steps-photo-500x500.png',
            ],
            [
                'id'       => 8,
                'nama'     => 'French Fries',
                'kategori' => 'Snack',
                'harga'    => 10000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://kirbiecravings.com/wp-content/uploads/2019/09/easy-french-fries-1.jpg',
            ],
            [
                'id'       => 9,
                'nama'     => 'Joshua',
                'kategori' => 'Minuman',
                'harga'    => 10000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://www.jagel.id/api/listimage/v/Es-Joshua-Extra-Joss-Susu-0-6745ed839aef177c.jpg',
            ],
            [
                'id'       => 10,
                'nama'     => 'Mendoan',
                'kategori' => 'Snack',
                'harga'    => 10000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://www.blok-a.com/wp-content/uploads/2022/10/tempe-mendoan.jpg',
            ],
            [
                'id'       => 11,
                'nama'     => 'Dimsum',
                'kategori' => 'Snack',
                'harga'    => 10000,
                'status'   => 'Tersedia',
                'gambar'   => 'https://images.tokopedia.net/img/KRMmCm/2022/8/16/2fba2414-9ad0-4291-bf4a-ec8dabfb86d3.jpg',
            ],
            [
                'id'       => 12,
                'nama'     => 'Es Krim Vanilla',
                'kategori' => 'Dessert',
                'harga'    => 10000,
                'status'   => 'Habis',
                'gambar'   => 'https://blog.tokowahab.com/wp-content/uploads/2018/10/resep-es-krim-vanilla-homemade.jpg',
            ],
        ];

        return view('pengelolaan', compact('username', 'menuList'));
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}