<div class="navbar bg-base-100 shadow-sm sticky top-0 z-10">
    <div class="flex-none lg:hidden">
        <label for="sidebar-toggle" class="btn btn-square btn-ghost">
            <i class="fas fa-bars"></i>
        </label>
    </div>
    <div class="flex-1">
        <h2 class="text-xl font-bold" id="page-title">Dashboard</h2>
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="https://placehold.co/40x40" />
                </div>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('profile.edit') }}"><i class="fas fa-user mr-2"></i> Profile</a></li>
                <li>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="button"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
