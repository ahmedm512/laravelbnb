<template>
<div v-if="loading">Data is loading...</div>
  <CCardBody v-else>
    <CDataTable
      :items="dateFilteredItems"
      :fields="fields"
      sorter
      column-filter
      hover
      itemsPerPageSelect
      pagination
    >
      <template #registeredTimestamp-filter="{item}">
        From:
        <input
          type="date"
          :value="new Date(startDate).toISOString().substr(0, 10)"
          @change="setDateFilter"
          class="mr-2"
        />
        To:
        <input
          type="date"
          :value="new Date(endDate).toISOString().substr(0, 10)"
          @change="e => setDateFilter(e, 'end')"
        />        
      </template>
      <template #registeredTimestamp="{item}">
        <td>
          {{ item.registeredDate }}
        </td>
      </template>
    </CDataTable>
  </CCardBody>
</template>

<script>


const fields = [
  'name',
  'email',
  'job',
  'gender',
  { key: 'registeredTimestamp', label: 'Registered' },
]

export default {
  name: 'itemsComputationTable',
  data () {
    return {
      loading: false,
      items:[],
      fields,
      startDate: 1608422400,
      endDate: 1608786924
    }
  },
  computed: {
    computedItems () {
      return this.items.map(item => {
       
        return { 
          ...item, 
          registeredTimestamp: new Date(item.created_at).getTime()/1000, 
          registeredDate: new Date(item.created_at)
        }
      })
    },
    dateFilteredItems() {
      return this.computedItems.filter(item => {
        const date = item.registeredTimestamp
        return date >= this.startDate && date <= this.endDate
      })
    }
  },
  methods: {
    setDateFilter (e, end) {
      if (end) {
        this.endDate = new Date(e.target.value).getTime()
      } else {
        this.startDate = new Date(e.target.value).getTime()
      }
    }
  },
  created() {
    this.loading = true;
    try {
    const request = axios.get("/api/users").then(response => {
      this.items = response.data;
      console.log(this.items, "users");
      this.loading = false;
    });
    } catch {
        this.loading = true;
        alert('Could Not Fetch Data');
    }
  }

}
</script>   