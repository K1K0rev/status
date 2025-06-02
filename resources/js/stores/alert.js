import { defineStore } from 'pinia'

export const useAlertStore = defineStore('alert', {
  state: () => ({
    alerts: [],
  }),
  actions: {
    add(type, message) {
      const id = Date.now()
      this.alerts.push({ id, type, message })

      setTimeout(() => {
        this.remove(id)
      }, 3000);

			setTimeout(() => {}, 10);
    },
    remove(id) {
      this.alerts = this.alerts.filter(n => n.id !== id)
    },
    clear() {
      this.alerts = []
    }
  }
})
