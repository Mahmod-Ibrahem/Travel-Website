<template>
    <!-- Summary of Month Transaction  -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">

        <!--    Active Products -->
        <div class="DashCard" style="animation-delay: 0.1s">
            <label class="text-lg font-semibold block mb-2">Active Products</label>
            <template v-if="!loading">
                <span class="text-3xl font-semibold">{{ DashData.activeProducts }}</span>
            </template>
            <Spinner v-else />
        </div>
        <!--/    Active Products -->

        <!--    Total Income -->
        <div class="DashCard" style="animation-delay: 0.2s">
            <label class="text-lg font-semibold block mb-2">Total Income

            </label>
            <template v-if="!loading">
                <span class="text-3xl font-semibold">{{ DashData.totalIncome }} USD
                </span>

            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/    Total Income -->

        <!--    Net Income -->
        <div class="DashCard" style="animation-delay: 0.2s">
            <label class="text-lg font-semibold block mb-2">Net Profit Income

            </label>
            <template v-if="!loading">
                <span class="text-3xl font-semibold">{{ DashData.netIncome }} USD
                </span>

            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/    Net Income -->


        <!--    Month Income -->
        <div class="DashCard">
            <label class="text-lg font-semibold block mb-2">Monthly Income</label>
            <template v-if="!loading">
                <span class="text-3xl font-semibold">{{ DashData.monthIncome }} USD</span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/    MonthIncome -->

        <!--    Net Month Income -->
        <div class="DashCard">
            <label class="text-lg font-semibold block mb-2">Net monthly profit</label>
            <template v-if="!loading">
                <span class="text-3xl font-semibold">{{ DashData.netMonthIncome }} USD</span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/   Net MonthIncome -->

        <!--   countOfMonthOrders -->
        <div class="DashCard">
            <label class="text-lg font-semibold block mb-2">Orders of the month</label>
            <template v-if="!loading">
                <span class="text-3xl font-semibold">{{ DashData.countOfMonthOrders }} </span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/   countOfMonthOrders -->

        <!--   countOfTotalOrders -->
        <div class="DashCard">
            <label class="text-lg font-semibold block mb-2">Today's orders</label>
            <template v-if="!loading">
                <span class="text-3xl font-semibold">{{ DashData.countOfTodayOrders }} </span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/   countOfTotalOrders -->

        <!--    Today's Net  -->
        <div class="DashCard" style="animation-delay: 0.2s">
            <label class="text-lg font-semibold block mb-2">Net profit today</label>
            <template v-if="!loading">
                <span class="text-3xl font-semibold">{{ DashData.dayNet }} USD</span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/    Today's Net -->

    </div>

        <!-- End  Summary of Month Transaction  -->
        <div class="grid grid-rows-1 md:grid-rows-2 md:grid-flow-col grid-cols-1 md:grid-cols-3 gap-3">
    <!--Latest Orders-->
    <div class="col-span-1 md:col-span-2 row-span-1 md:row-span-2 bg-white py-6 px-5 rounded-lg shadow border-2">
      <label class="text-lg font-semibold block mb-2">Latest Orders</label>
      <template v-if="!loading">
        <div v-for="o of DashData.latestOrders" :key="o.id" class="py-2 px-3 hover:bg-gray-50 font-semibold">
          <p>
            <RouterLink :to="{name: 'app.orders.view', params: {id: o.id}}" class="text-indigo-700 font-semibold cursor-pointer">
              Order  #{{ o.id    }}
            </RouterLink>
            Created {{ o.created_at }}  . {{ o.items }} items  . Room  {{ o.room }}
          </p>
          <p class="flex justify-between">
            <span>Name : {{ o.name }}</span>
            <span>{{ o.total_price }} USD</span>
          </p>
        </div>
      </template>
      <Spinner v-else text="" class=""/>
    </div>
        <!--End of Latest Orders-->

    <!--Dougnut Chart-->
    <div class="bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center border-2">
      <label class="text-lg font-semibold block mb-2">Best selling product</label>
      <template v-if="!loading">
        <DoughnutChart :data="DashData.bestSellingProduct"/>
      </template>
      <Spinner v-else text="" class=""/>
    </div>
    <!-- End Of Doughnut Chart-->
        </div>
</template>

<script setup>




</script>
