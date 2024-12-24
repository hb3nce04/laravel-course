<x-app-layout title="My Favourite Cars">
    <main>
        <!-- New Cars -->
        <section>
            <div class="container">
                <div class="flex justify-between items-center">
                    <h1 class="car-details-page-title">My Favourite Cars</h1>
                    @if($cars->total() > 0)
                        <div class="pagination-summary">
                            <p>Showing {{$cars->firstItem()}} to {{$cars->lastItem()}} of {{$cars->total()}} results</p>
                        </div>
                    @endif
                </div>
                <div class="car-items-listing">
                    @foreach($cars as $car)
                        <x-car-item :$car :isInWatchList="true"/>
                    @endforeach
                </div>
                {{$cars->onEachSide(1)->links()}}
            </div>
        </section>
        <!--/ New Cars -->
    </main>
</x-app-layout>
