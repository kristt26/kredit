angular
	.module('admin.service', ['helper.service'])
	.factory('KriteriaService', KriteriaService)
	.factory('SubKriteriaService', SubKriteriaService)
	.factory('AnalisaService', AnalisaService);

function KriteriaService($http, $q, helperServices) {
	var url = helperServices.url + '/kriterium/';
	var service = {
		Items: []
	};
	service.get = function () {
		var def = $q.defer();
		if (service.instance) {
			def.resolve(service.Items);
		} else {
			$http({
				method: 'GET',
				url: url + 'getkriteria',
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					swal("Information!", err.data, "error");
					def.reject(err);
				}
			);
		}
		return def.promise;
	};
	service.checkcr = function(item){
		var def = $q.defer();
		$http({
			method: 'POST',
			url: url + 'checkcr',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.post = function(item){
		var def = $q.defer();
		$http({
			method: 'POST',
			url: url + 'add',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.simpan = function(item){
		var def = $q.defer();
		$http({
			method: 'POST',
			url: url + 'simpankriteria',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				service.Items.kriteria.push(response.data);
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.ubah = function(item){
		var def = $q.defer();
		$http({
			method: 'PUT',
			url: url + 'edit',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				var data = service.Items.kriteria.find(x=>x.idkriteria==item.idkriteria);
				if(data){
					data.kriteria = item.kriteria;
				}
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.hapus = function(id){
		var def = $q.defer();
		$http({
			method: 'DELETE',
			url: url + 'remove/' + id,
			headers: {
				'Content-Type': 'application/json'
			}
		}).then(
			(response) => {
				var data = service.Items.kriteria.find(x=>x.idkriteria==id);
				if(data){
					var index = service.Items.kriteria.indexOf(data);
					service.Items.kriteria.splice(index,1);
				}
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	return service;
}

function SubKriteriaService($http, $q, helperServices) {
	var url = helperServices.url + '/subkriteria/';
	var service = {
		Items: []
	};
	service.get = function () {
		var def = $q.defer();
		if (service.instance) {
			def.resolve(service.Items);
		} else {
			$http({
				method: 'GET',
				url: url + 'getdata',
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					swal("Information!", err.data, "error");
					def.reject(err);
				}
			);
		}
		return def.promise;
	};
	service.checkcr = function(item){
		var def = $q.defer();
		$http({
			method: 'POST',
			url: url + 'checkcr',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.post = function(item){
		var def = $q.defer();
		$http({
			method: 'POST',
			url: url + 'add',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.simpanbobot = function(item){
		var def = $q.defer();
		$http({
			method: 'POST',
			url: url + 'simpanbobot',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.ubah = function(item){
		var def = $q.defer();
		$http({
			method: 'PUT',
			url: url + 'edit',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				var data = service.Items.kriteria.find(x=>x.idkriteria==item.idkriteria);
				if(data){
					data.kriteria = item.kriteria;
				}
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.hapus = function(id){
		var def = $q.defer();
		$http({
			method: 'DELETE',
			url: url + 'remove/' + id,
			headers: {
				'Content-Type': 'application/json'
			}
		}).then(
			(response) => {
				var data = service.Items.kriteria.find(x=>x.idkriteria==id);
				if(data){
					var index = service.Items.kriteria.indexOf(data);
					service.Items.kriteria.splice(index,1);
				}
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	return service;
}
function AnalisaService($http, $q, helperServices) {
	var url = helperServices.url + '/analisa/';
	var service = {
		Items: []
	};
	service.get = function () {
		var def = $q.defer();
		if (service.instance) {
			def.resolve(service.Items);
		} else {
			$http({
				method: 'GET',
				url: url + 'getkaryawan',
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(
				(response) => {
					service.instance = true;
					service.Items = response.data;
					def.resolve(service.Items);
				},
				(err) => {
					swal("Information!", err.data, "error");
					def.reject(err);
				}
			);
		}
		return def.promise;
	};
	service.checkcr = function(item){
		var def = $q.defer();
		$http({
			method: 'POST',
			url: url + 'checkcr',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data.message, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	service.post = function(item){
		var def = $q.defer();
		$http({
			method: 'POST',
			url: url + 'add',
			headers: {
				'Content-Type': 'application/json'
			},
			data: item
		}).then(
			(response) => {
				def.resolve(response.data);
			},
			(err) => {
				swal("Information!", err.data, "error");
				def.reject(err);
			}
		);
		return def.promise;
	};
	return service;
}