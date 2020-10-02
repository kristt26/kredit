(function (angular) {
    'use strict'
    angular.module('ctrl', [])
        .controller('PembobotanController', PembobotanController)
        .controller('KriteriaController', KriteriaController)
        .controller('SubKriteriaController', SubKriteriaController)
        .controller('AnalisaController', AnalisaController);

    function PembobotanController($scope, $http, helperServices, KriteriaService) {
        $scope.datas = [];
        $scope.model = {};
        $scope.element = [];
        KriteriaService.get().then(x => {
            for (let index = 0; index < x.kriteria.length - 1; index++) {
                var item = {};
                item.kriteria = x.kriteria[index];
                for (let index1 = index + 1; index1 < x.kriteria.length; index1++) {
                    item.kriteria1 = x.kriteria[index1];
                    $scope.element.push(angular.copy(item));
                }
            }
            if (x.pembobotan) {
                x.pembobotan.forEach(bobot => {
                    var a = $scope.element.find(x => x.kriteria.idkriteria == bobot.idkriteria && x.kriteria1.idkriteria == bobot.idkriteria1);
                    a.bobot = bobot.bobot;
                    a.nilai = parseFloat(a.bobot);
                    a.nama = a.kriteria.kriteria;
                });
                $scope.checkcr();
            }


            //   $.LoadingOverlay("hide");
        })
        $scope.setNilai = (item) => {
            item.nilai = parseFloat(item.bobot);
            item.nama = item.kriteria.kriteria;
            console.log(item.bobot);
        }
        $scope.checkcr = () => {
            KriteriaService.checkcr($scope.element).then(x => {
                $scope.datas = x;
                $scope.datas.relativecriteria = angular.copy($scope.datas.criterias);
                var item = { name: 'Priority' };
                $scope.datas.matrixnormal = angular.copy($scope.datas.relativeMatrix)
                $scope.datas.relativecriteria.push(angular.copy(item));
                for (let index = 0; index < $scope.datas.relativeMatrix.length; index++) {
                    $scope.datas.matrixnormal[index].push(angular.copy($scope.datas.eigenVector[index]));
                }
            })
        }
        $scope.simpan = () => {
            KriteriaService.post($scope.element).then(x => {

            })
        }
    }

    function KriteriaController($scope, $http, helperServices, KriteriaService) {
        $scope.datas = [];
        $scope.model = {};
        $scope.titledialog = "Tambah Kriteria";
        $scope.element = [];
        KriteriaService.get().then(x => {
            $scope.datas = x;
        })
        $scope.simpan = () => {
            swal({
                title: "Anda yakin melanjutkan proses???",
                text: "",
                icon: "info",
                buttons: true,
                dangerMode: false,
            })
                .then((value) => {
                    if (value) {
                        if ($scope.model.idkriteria) {
                            KriteriaService.ubah($scope.model).then((x) => {
                                swal("Proses Berhasil", {
                                    icon: "success",
                                });
                                $scope.model = {};
                                $("#add").modal("hide")
                            })
                        } else {
                            KriteriaService.simpan($scope.model).then((x) => {
                                swal("Proses Berhasil", {
                                    icon: "success",
                                });
                                $scope.model = {};
                                $("#add").modal("hide")
                            })
                        }
                    }
                });
        }
        $scope.edit = (item) => {
            $scope.model = item;
            $scope.titledialog = "Ubah Kriteria";
            $("#add").modal("show");
        }
        $scope.hapus = (item) => {
            swal({
                title: "Anda yakin menghapus data???",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((value) => {
                    if (value) {
                        KriteriaService.hapus(item.idkriteria).then((x) => {
                            swal("Proses Berhasil", {
                                icon: "success",
                            });
                        })
                    }
                });
        }
    }

    function SubKriteriaController($scope, $http, helperServices, SubKriteriaService) {
        $scope.datas = [];
        $scope.model = {};
        $scope.titledialog = "Tambah Sub Kriteria";
        $scope.element = [];
        $scope.nilai = [];
        $scope.datassub = [];
        SubKriteriaService.get().then(params => {
            $scope.datas = params.subkriteria;
            $scope.next();
            if (params.bobot.length > 0) {
                params.bobot.forEach(bobot => {
                    $scope.datas.forEach(element => {
                        var a = element.item.find(x => x.idkriteria == bobot.idkriteria && x.kriteria1.idkriteria == bobot.idkriteria1);
                        a.bobot = bobot.bobot;
                        a.nilai = parseFloat(a.bobot);
                        a.nama = a.kriteria.kriteria;
                    });
                    
                });
                $scope.checkcr();
            }
            
        })
        $scope.addsub = (item) => {
            $scope.model.idkriteria = item.idkriteria;
            $scope.titledialog = "Tambah Sub Kriteria " + item.kriteria;

            $("#add").modal("show");
        }
        $scope.simpan = () => {
            swal({
                title: "Anda yakin melanjutkan proses???",
                text: "",
                icon: "info",
                buttons: true,
                dangerMode: false,
            })
                .then((value) => {
                    if (value) {
                        if ($scope.model.idsubkriteria) {
                            SubKriteriaService.ubah($scope.model).then((x) => {
                                swal("Proses Berhasil", {
                                    icon: "success",
                                });
                                $scope.model = {};
                                $("#add").modal("hide")
                            })
                        } else {
                            SubKriteriaService.simpan($scope.model).then((x) => {
                                swal("Proses Berhasil", {
                                    icon: "success",
                                });
                                $scope.model = {};
                                $("#add").modal("hide")
                            })
                        }
                    }
                });
        }
        $scope.edit = (item) => {
            $scope.model = item;
            $scope.titledialog = "Ubah Kriteria";
            $("#add").modal("show");
        }
        $scope.hapus = (item) => {
            swal({
                title: "Anda yakin menghapus data???",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((value) => {
                    if (value) {
                        SubKriteriaService.hapus(item.idkriteria).then((x) => {
                            swal("Proses Berhasil", {
                                icon: "success",
                            });
                        })
                    }
                });
        }
        $scope.next = () => {
            // $scope.view = 'bobot';
            $scope.datas.forEach(itemkriteria => {
                itemkriteria.item = [];
                for (let index = 0; index < itemkriteria.subkriteria.length - 1; index++) {
                    var item = {};
                    item.subkriteria = itemkriteria.subkriteria[index];
                    for (let index1 = index + 1; index1 < itemkriteria.subkriteria.length; index1++) {
                        item.subkriteria1 = itemkriteria.subkriteria[index1];
                        itemkriteria.item.push(angular.copy(item));
                    }
                }
            });
            console.log($scope.datas);
        }
        $scope.setNilai = (item) => {
            item.nilai = parseFloat(item.bobot);
            item.nama = item.subkriteria.subkriteria;
        }

        $scope.checkcr = () => {
            $scope.model.alternatif = [];
            $scope.model.kriteria = $scope.datas;
            SubKriteriaService.checkcr($scope.model).then(x => {
                $scope.nilai = x;
                $scope.nilai.datahitung = [];
                for (var prop in $scope.nilai.subCriteriaPairWise) {
                    var item = {};
                    item.name = prop;
                    item.matrix = $scope.nilai.rawSubCriteria[prop];
                    item.eigen = $scope.nilai.subCriteriaPairWise[prop].eigen;
                    item.cr = $scope.nilai.subCriteriaPairWise[prop].cr;
                    $scope.nilai.datahitung.push(angular.copy(item));
                    // console.log($scope.datas.criteriaPairWise[prop]);
                }
                console.log($scope.nilai);
                // $scope.datas.relativecriteria = angular.copy($scope.datas.criterias);
                // var item = { name: 'Priority' };
                // $scope.datas.matrixnormal = angular.copy($scope.datas.relativeMatrix)
                // $scope.datas.relativecriteria.push(angular.copy(item));
                // for (let index = 0; index < $scope.datas.relativeMatrix.length; index++) {
                //     $scope.datas.matrixnormal[index].push(angular.copy($scope.datas.eigenVector[index]));
                // }
            })
            $scope.view = 'hasil';
        }
        $scope.simpanbobot = () => {
            SubKriteriaService.simpanbobot($scope.datas).then(x => {

            })
        }
    }

    function AnalisaController($scope, $http, helperServices, AnalisaService) {
        $scope.datas = [];
        $scope.karyawans = [];
        $scope.kriteria = [];
        $scope.model = {};
        $scope.element = [];
        $scope.alternatif = [];
        $scope.view = 'karyawan';
        AnalisaService.get().then(x => {
            $scope.karyawans = x.karyawan;
            $scope.kriteria = x.kriteria.kriteria;
            // for (let index = 0; index < x.length-1; index++) {
            //     var item = {};
            //     item.kriteria = x[index];
            //     for (let index1 = index+1; index1 < x.length; index1++) {
            //         item.kriteria1 = x[index1];
            //         $scope.element.push(angular.copy(item));
            //     }
            // }
            //   $.LoadingOverlay("hide");
        })
        $scope.additem = (item) => {
            if (item.check) {
                $scope.alternatif.push(angular.copy(item))
            } else {
                var data = $scope.alternatif.find(x => x.idkaryawan == item.idkaryawan);
                if (data) {
                    var index = $scope.alternatif.indexOf(data);
                    $scope.alternatif.splice(index, 1);
                }

            }
        }
        $scope.next = () => {
            if ($scope.alternatif.length >= 2) {
                $scope.view = 'bobot';
                $scope.kriteria.forEach(itemkriteria => {
                    itemkriteria.item = [];
                    for (let index = 0; index < $scope.alternatif.length - 1; index++) {
                        var item = {};
                        item.alternatif = $scope.alternatif[index];
                        for (let index1 = index + 1; index1 < $scope.alternatif.length; index1++) {
                            item.alternatif1 = $scope.alternatif[index1];
                            itemkriteria.item.push(angular.copy(item));
                        }
                    }
                });
                console.log($scope.kriteria);
            }
            else
                swal('!Information', 'Data Alternatif minimal 2 item', 'error')
        }
        $scope.back = () => {
            if ($scope.view == 'hasil')
                $scope.view = 'bobot';
        }
        $scope.setNilai = (item) => {
            item.nilai = parseFloat(item.bobot);
            item.nama = item.alternatif.nama;
        }
        $scope.checkcr = () => {
            $scope.model.alternatif = $scope.alternatif;
            $scope.model.kriteria = $scope.kriteria;
            AnalisaService.checkcr($scope.model).then(x => {
                $scope.datas = x;
                $scope.datas.datahitung = [];
                for (var prop in $scope.datas.criteriaPairWise) {
                    var item = {};
                    item.name = prop;
                    item.matrix = $scope.datas.rawCriteria[prop];
                    item.eigen = $scope.datas.criteriaPairWise[prop].eigen;
                    item.cr = $scope.datas.criteriaPairWise[prop].cr;
                    $scope.datas.datahitung.push(angular.copy(item));
                    // console.log($scope.datas.criteriaPairWise[prop]);
                }
                console.log($scope.datas);
                // $scope.datas.relativecriteria = angular.copy($scope.datas.criterias);
                // var item = { name: 'Priority' };
                // $scope.datas.matrixnormal = angular.copy($scope.datas.relativeMatrix)
                // $scope.datas.relativecriteria.push(angular.copy(item));
                // for (let index = 0; index < $scope.datas.relativeMatrix.length; index++) {
                //     $scope.datas.matrixnormal[index].push(angular.copy($scope.datas.eigenVector[index]));
                // }
            })
            $scope.view = 'hasil';
        }
        $scope.simpan = () => {
            AnalisaService.post($scope.kriteria).then(x => {

            })
        }
    }
})(window.angular);