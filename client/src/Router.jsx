import { Routes, Route, BrowserRouter } from "react-router-dom";
import Home from "./components/Home";
import Layout from "./components/core/Layout";


function Router() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout><Home /></Layout>} />
      </Routes>
  </BrowserRouter>
  );
}

export default Router;
