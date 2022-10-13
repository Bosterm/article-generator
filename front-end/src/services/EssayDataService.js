import http from "../http-common";

class EssayDataService {
  getAll() {
    return http.get("/essay");
  }

  get(id) {
    return http.get(`/essay/${id}`);
  }

  create(data) {
    return http.post("/essay", data);
  }

  update(id, data) {
    return http.put(`/essay/${id}`, data);
  }

  delete(id) {
    return http.delete(`/essay/${id}`);
  }

  deleteAll() {
    return http.delete(`/essay`);
  }

}

export default new EssayDataService();