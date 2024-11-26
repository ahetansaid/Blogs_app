<x-layout>
    <form class="profile-form" method="post" action="{{ route('destroy_user')}}">
        @csrf
       You sure to delete your  profile?
        <button x-ref="btn" class="bg-red-600"  >Delete  my profile</button>
    </form>
</x-layout>