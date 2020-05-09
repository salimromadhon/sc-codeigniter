$(document).ready(() => {
    const vm = {
        init() {
            this.showAlert()
            this.confirmDeleteMahasiswa()
        },
        showAlert() {
            if (!alert || !alert.message || !alert.type) {
                return
            }
            if (['info', 'success', 'error', 'danger', 'question', 'warning'].indexOf(alert.type) < 0) {
                alert.type = 'info'
            }
            switch (alert.type) {
                case 'success':
                    alert.title = 'Sukses'
                    break
                case 'error':
                case 'danger':
                    alert.type = 'error'
                    alert.title = 'Kesalahan'
                    break
                case 'question':
                case 'warning':
                    alert.type = 'warning'
                    alert.title = 'Perhatian'
                    break
            
                default:
                    alert.title = 'Info'
                    break
            }
            Swal.fire(alert.title, alert.message, alert.type)
        },
        confirmDeleteMahasiswa() {
            $('.delete-mahasiswa').click((e) => {
                Swal.fire({
                    title: 'Yakin menghapus?',
                    text: 'Aksi ini tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    focusCancel: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    let href =  $(e.target).data('href')
                    if (result.value && href) {
                        window.location.href = href
                    }
                  })
            })
        }
    }

    vm.init()
})