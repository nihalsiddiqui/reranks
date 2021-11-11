<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert(
            [
                ['name'=>'role-list','guard_name'=>'web'],
                ['name'=>'role-create','guard_name'=>'web'],
                ['name'=>'role-edit','guard_name'=>'web'],
                ['name'=>'role-delete','guard_name'=>'web'],
                //general settings
                ['name'=>'general-settings','guard_name'=>'web'],
                ['name'=>'general-limits','guard_name'=>'web'],
//                societies data types
                ['name'=>'types-create','guard_name'=>'web'],
                ['name'=>'types-list','guard_name'=>'web'],
                ['name'=>'types-edit','guard_name'=>'web'],
                ['name'=>'types-delete','guard_name'=>'web'],
                //                societies data facilities
                ['name'=>'facilities-create','guard_name'=>'web'],
                ['name'=>'facilities-list','guard_name'=>'web'],
                ['name'=>'facilities-edit','guard_name'=>'web'],
                ['name'=>'facilities-delete','guard_name'=>'web'],
//                Maintenance mode create, store
                    ['name'=>'maintenance-create','guard_name'=>'web'],
//                Billing Information
                ['name'=>'billing-create','guard_name'=>'web'],
//                Email settings
                ['name'=>'email-create','guard_name'=>'web'],
//                 Storage
                ['name'=>'storage-create','guard_name'=>'web'],
//              Theme
                ['name'=>'theme-create','guard_name'=>'web'],
//                Custom CSS/JS
                ['name'=>'CSS/JS-create','guard_name'=>'web'],
//                  Posts list,delete
                ['name'=>'Posts-list','guard_name'=>'web'],
                ['name'=>'Posts-delete','guard_name'=>'web'],
//                  Subscriptions
                ['name'=>'subscriptions-list','guard_name'=>'web'],
//                    Transactions
                ['name'=>'transactions-list','guard_name'=>'web'],
                ['name'=>'transactions-delete','guard_name'=>'web'],
//                    Deposits
                ['name'=>'Deposits-list','guard_name'=>'web'],
                ['name'=>'Deposits-view','guard_name'=>'web'],
                ['name'=>'Deposits-approve','guard_name'=>'web'],
                ['name'=>'Deposits-delete','guard_name'=>'web'],
//            members
                ['name'=>'members-create','guard_name'=>'web'],
                ['name'=>'members-list','guard_name'=>'web'],
                ['name'=>'members-edit','guard_name'=>'web'],
                ['name'=>'members-delete','guard_name'=>'web'],
//                Languages
                ['name'=>'languages-create','guard_name'=>'web'],
                ['name'=>'languages-list','guard_name'=>'web'],
                ['name'=>'languages-edit','guard_name'=>'web'],
                ['name'=>'languages-delete','guard_name'=>'web'],
//                    Categories
                ['name'=>'categories-create','guard_name'=>'web'],
                ['name'=>'categories-list','guard_name'=>'web'],
                ['name'=>'categories-edit','guard_name'=>'web'],
                ['name'=>'categories-delete','guard_name'=>'web'],
//                    Reports
                ['name'=>'reports-list','guard_name'=>'web'],
                ['name'=>'reports-delete','guard_name'=>'web'],
//                Withdrawals
                ['name'=>'withdrawals-list','guard_name'=>'web'],
                ['name'=>'withdrawals-view','guard_name'=>'web'],
//                Verification Requests
                ['name'=>'memberVerification-list','guard_name'=>'web'],
//                Pages
                ['name'=>'pages-create','guard_name'=>'web'],
                ['name'=>'pages-list','guard_name'=>'web'],
                ['name'=>'pages-edit','guard_name'=>'web'],
                ['name'=>'pages-delete','guard_name'=>'web'],
//                Blog
                ['name'=>'blog-create','guard_name'=>'web'],
                ['name'=>'blog-list','guard_name'=>'web'],
                ['name'=>'blog-edit','guard_name'=>'web'],
                ['name'=>'blog-delete','guard_name'=>'web'],
//                Profiles Social
                ['name'=>'profiles_social-edit','guard_name'=>'web'],
//                    Social Login
                ['name'=>'social_login-edit','guard_name'=>'web'],
//                Google
                ['name'=>'Google-edit','guard_name'=>'web'],
//                    Progressive Web Apps (PWA)
                ['name'=>'PWA-edit','guard_name'=>'web'],
//                    Payment Settings
                ['name'=>'Payment_Settings-general-edit','guard_name'=>'web'],
                ['name'=>'payment_gateways','guard_name'=>'web'],

            ]
        );
    }

}
