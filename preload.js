const { contextBridge } = require('electron')
const path = require('path')

contextBridge.exposeInMainWorld('electron', {
  require: (module) => {
    const requirePath = path.join(__dirname, module)
    return require(requirePath)
  }
})
