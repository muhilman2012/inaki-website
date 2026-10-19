# Workspace Rules for Antigravity

## WSL Path Conventions on Windows
When running inside Antigravity on Windows accessing files in WSL (`Ubuntu`):
1. **Always use Windows UNC backslash paths** for all tool arguments (`TargetFile`, `AbsolutePath`, `Path`):
   - Example: `\\wsl.localhost\Ubuntu\home\hilman\code\inaki-website\...`
2. **Never use forward slashes at the start of WSL paths**:
   - Do NOT use `//wsl.localhost/...` or `file:////wsl.localhost/...`.
   - Forward slashes with `//` trigger a strict RFC 3986 `[UriError]` in the Antigravity IDE renderer (`vscode-uri`), causing the conversation history to crash (blank white page).
