export function getServicesById(facility_id) {
  return axios
    .get(`${baseURL}patients/appointments/4`)
    .then((response) => {
      if (response.status === 200) {
        return response;
      }
    })
    .catch((error) => error);
}
